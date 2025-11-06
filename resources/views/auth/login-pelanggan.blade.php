@extends('layouts.guest')

@section('title', 'Login Pelanggan - Restoran ABC')

@section('content')
    <br><br>
    <div
        style="
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(10px);
        ">
        <div
            style="
                width: 400px;
                padding: 40px 30px;
                border-radius: 20px;
                background: rgba(0, 0, 0, 0.85);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(10px);
                text-align: center;
            ">
            <h2 class="mb-4" style="color: #fff; font-weight: 600;">Login Pelanggan</h2>

            {{-- Notifikasi sukses --}}
            @if (session('success'))
                <div
                    style="
                        background: rgba(0,255,0,0.15);
                        border: 1px solid #00cc00;
                        color: #00ff00;
                        padding: 10px;
                        border-radius: 8px;
                        margin-bottom: 15px;
                        font-size: 14px;
                    ">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div id="alertError" class="alert text-center"
                    style="background: rgba(255, 50, 50, 0.9); color: white; padding: 10px; border-radius: 8px; margin-bottom: 15px;">
                    {{ session('error') }}
                </div>
            @endif


            <form method="POST" action="{{ route('pelanggan.login.post') }}">
                @csrf

                <div class="form-group mb-3 text-start">
                    <label for="email" style="color:#fff; font-weight:500;">Email</label>
                    <input id="email" type="email" name="email" class="form-control"
                        style="background: rgba(255,255,255,0.9); color:#000; border: none; border-radius: 10px; padding: 10px 15px;"
                        required autofocus>
                </div>

                <div class="form-group mb-4 text-start">
                    <label for="password" style="color:#fff; font-weight:500;">Password</label>
                    <input id="password" type="password" name="password" class="form-control"
                        style="background: rgba(255,255,255,0.9); color:#000; border: none; border-radius: 10px; padding: 10px 15px;"
                        required>
                </div>

                <button type="submit"
                    style="width: 100%; padding: 12px; background: #ff3333; color: white; border: none; border-radius: 25px; font-size: 16px; transition: 0.3s;">
                    Login
                </button>

                <p class="mt-3" style="color:#fff;">
                    Belum punya akun?
                    <a href="{{ route('pelanggan.register') }}" style="color:#ff6666; font-weight:600;">Daftar di sini</a>
                </p>
            </form>
        </div>
    </div>
@endsection
