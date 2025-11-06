<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register-pelanggan');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:pelanggans,email',
            'password' => 'required|min:6|confirmed',
            'telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        Pelanggan::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pelanggan.login')
            ->with('success', 'Berhasil mendaftar! Silakan login.');
    }
}
