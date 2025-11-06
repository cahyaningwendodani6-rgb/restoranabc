@extends('layouts.guest')

@section('title', 'Daftar Pelanggan - Restoran ABC')

@section('content')
<br>
<br>
<br><br><br><br>
    <style>
        body {
            background: #000;
            color: #fff;
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: rgba(0, 0, 0, 0.9);
        }

        .register-box {
            width: 380px;
            background: rgba(255, 255, 255, 0.08);
            padding: 35px 30px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .register-box h2 {
            font-weight: 600;
            margin-bottom: 25px;
            color: #fff;
        }

        .register-box label {
            text-align: left;
            width: 100%;
            display: block;
            color: #ddd;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .register-box input,
        .register-box textarea {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 10px 14px;
            background: rgba(255, 255, 255, 0.9);
            margin-bottom: 15px;
            color: #000;
        }

        .register-box button {
            width: 100%;
            padding: 10px;
            background: #ff3b3b;
            border: none;
            border-radius: 25px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .register-box button:hover {
            background: #ff6666;
        }

        .register-box p {
            margin-top: 10px;
            color: #ccc;
            font-size: 14px;
        }

        .register-box a {
            color: #ff6666;
            text-decoration: none;
            font-weight: 600;
        }

        .register-box a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="register-container">
        <div class="register-box">
            <h2>Daftar Pelanggan</h2>

            @if ($errors->any())
                <div class="alert alert-danger text-start" style="font-size: 14px;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
    <div style="
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

            <form method="POST" action="{{ route('pelanggan.register.post') }}">
                @csrf
                <label for="name">Nama Lengkap</label>
                <input id="name" type="text" name="name" required>

                <label for="email">Email</label>
                <input id="email" type="email" name="email" required>

                <label for="telp">Nomor Telepon</label>
                <input id="telp" type="text" name="telp">

                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="2"></textarea>

                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>

                <label for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>

                <button type="submit">Daftar</button>

                <p>Sudah punya akun? <a href="{{ route('pelanggan.login') }}">Login di sini</a></p>
            </form>
        </div>
    </div>
@endsection
