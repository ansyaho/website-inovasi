<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthentikasiController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function akses()
    {
        return view('auth.akses');
    }


    public function proseslogin(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        // Coba login siswa dulu
        if (Auth::guard('siswa')->attempt([
            'username' => $login,
            'password' => $password
        ])) {
            return redirect()->route('siswa.dashboard');
        }

        // Kalau gagal baru admin
        if (Auth::guard('web')->attempt([
            'email' => $login,
            'password' => $password
        ])) {
            return redirect()->route('admin.dashboard');
        }


        return back()->with('error', 'Login gagal! Periksa kembali data anda.');
    }




    public function logout(Request $request)
    {
        // Logout admin (guard web)
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        // Logout siswa (guard siswa)
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }

        // Bersihkan session & token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('asal');
    }
}
