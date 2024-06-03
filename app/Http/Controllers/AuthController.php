<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Login'); // This should match the name of your view file without the .blade.php extension
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'pswd' => 'required',
        ]);
    
        // Attempt to retrieve the user based on the provided username
        $user = User::where('username', $request->username)->first();
    
        \Log::info('Attempted login with username: ' . $request->username);
    
        if ($user) {
            \Log::info('User found: ' . $user->username);
        } else {
            \Log::info('User not found with username: ' . $request->username);
        }
    
        // If user found and password matches
        if ($user && Hash::check($request->pswd, $user->password)) {
            // Manually set the session values
            Session::put('loggedInUserId', $user->ID_user);
            Session::put('last_logged_in_username', $user->username);
            Session::put('last_logged_in_userrole', $user->user_role);
    
            \Log::info('User logged in: ' . $user->username);
            \Log::info('Stored logged in user ID: ' . Session::get('loggedInUserId'));
    
            if ($request->has('remember')) {
                Cookie::queue('remembered_username', $user->username, 43200); // Cookie set for 30 days
            } else {
                Cookie::queue(Cookie::forget('remembered_username'));
            }
    
            if ($user->user_role === 'Admin') {
                return redirect('/adminhome');
            } else {
                return redirect('/homepage');
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Kombinasi username dan password tidak valid.']);
        }
    }
private function checkPassword($inputPassword, $hashedPassword)
{
    // Check if input password matches hashed password using Bcrypt
    return Hash::check($inputPassword, $hashedPassword);
}

    public function register(Request $request)
    {
        // Validate the input
        $request->validate([
            'username1' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ]);
    
        // Find the latest user ID from the database
        $latestUserID = User::max('ID_user');
    
        // Increment the latest user ID to generate a new ID
        $newID = 'U' . str_pad((intval(substr($latestUserID, 1)) + 1), 4, '0', STR_PAD_LEFT);
    
        // Create the user
        $user = User::create([
            'ID_user' => $newID,
            'user_role' => $request->role,
            'username' => $request->username1,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'sub_date' => now(),
        ]);
    
        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Registration successful!');
    }
    public function store(Request $request)
{
    $request->session()->regenerate();

    // Assuming 'ID_user' and 'username' are the columns storing the user ID and username
    $user = Auth::user();
    Session::put('loggedInUserId', $user->ID_user);
    Session::put('last_logged_in_username', $user->username);

    return redirect()->intended(RouteServiceProvider::HOME);
}
public function logout()
{
    Auth::logout();
    Session::flush();
    // Do not forget the cookie on logout, so it can be reused on the next login attempt.
    return redirect('/login');
}
}
