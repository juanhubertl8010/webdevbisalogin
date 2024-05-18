<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Login'); // This should match the name of your view file without the .blade.php extension
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'pswd' => 'required',
        ]);

        // Coba untuk mendapatkan user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Jika user ditemukan dan password cocok
        if ($user && Hash::check($request->pswd, $user->password)) {
            // Login user
            Auth::login($user, $request->remember);

            // Redirect ke halaman yang diinginkan
            return redirect('/homepage');
        }else{

        // Jika login gagal
        // return redirect('/usrlogin')->withErrors('Username tidak valid');
        return redirect()->back()->withInput()->withErrors(['error' => 'Kombinasi username dan password tidak valid.']);
    }
    }
}