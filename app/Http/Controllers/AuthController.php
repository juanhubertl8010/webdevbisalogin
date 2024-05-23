<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Login'); // This should match the name of your view file without the .blade.php extension
    }

    public function login(Request $request)
{
    // Validation
    $request->validate([
        'username' => 'required',
        'pswd' => 'required',
    ]);

    // Attempt to retrieve the user based on the provided username
    $user = User::where('username', $request->username)->first();

    // Logging login attempt
    \Log::info('Attempted login with username: ' . $request->username);
    
    if ($user) {
        \Log::info('User found: ' . $user->username);
    } else {
        \Log::info('User not found with username: ' . $request->username);
    }

    // If user found and password matches
    if ($user && $this->checkPassword($request->pswd, $user->password)) {
        // Authenticate user
        Auth::login($user, $request->remember);
        
        // Logging user login
        \Log::info('User logged in: ' . $user->username);
        \Log::info('User details: ' . json_encode($user));

        // Storing last logged-in username in session
        Session::put('last_logged_in_username', $user->username);

        // Redirecting based on user role
        if ($user->user_role === 'Admin') {
            return redirect('/adminhome');
        } else if ($user->user_role === 'Joki') {
            return redirect('/homejoki');
        } else {
            return redirect('/homepage');
        }
    } else {
        // Handling invalid login attempt
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
}
