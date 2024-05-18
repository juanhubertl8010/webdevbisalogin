<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ForgotPassController extends Controller
{
    public function show()
    {
        return view('forgotpassword');
    }
    public function resetPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'new_password' => 'required|confirmed'
            
        ]);

        // Cari pengguna berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Jika pengguna ditemukan
        if ($user) {
            // Update kata sandi pengguna
            $user->password = bcrypt($request->new_password);
            $user->save();

            return redirect()->route('login')->with('success', 'Password has been reset successfully.');
        } else {
            return redirect()->back()->with('error', 'Username not found.');
        }
    }
}
