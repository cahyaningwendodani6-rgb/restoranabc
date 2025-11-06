<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
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
        $credentials = $request->only('email', 'password');

        // 🔍 Cek apakah email sudah terdaftar di tabel pelanggan
        $user = \App\Models\Pelanggan::where('email', $request->email)->first();

        if (! $user) {
            return back()->with('error', 'Kamu belum terdaftar. Silakan daftar terlebih dahulu sebelum login.');
        }

        // ✅ Kalau email ada, baru coba login
        if (\Illuminate\Support\Facades\Auth::guard('pelanggan')->attempt($credentials)) {
            \App\Models\Pelanggan::where('id', \Illuminate\Support\Facades\Auth::guard('pelanggan')->id())
                ->update(['last_login_at' => \Carbon\Carbon::now()]);

            return redirect()->intended('/pemesanan')
                ->with('success', 'Berhasil login!');
        }

        // ❌ Kalau password salah
        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();

        return redirect()->route('pelanggan.login');
    }
}
