<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-pelanggan');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Gunakan guard default 'web' (atau buat guard khusus pelanggan kalau perlu)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/pemesanan'); // arahkan balik ke halaman pemesanan
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
