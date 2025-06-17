{{-- filepath: resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">
    <style>
        body {
            background: #f5f7fa;
            font-family: 'Montserrat', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .left {
            flex: 1.2;
            background: url('/images/bg-pattern.png');
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative;
        }
        .left img {
            width: 70%;
            max-width: 400px;
            margin-bottom: 30px;
        }
        .welcome {
            position: absolute;
            bottom: 60px;
            left: 60px;
            color: #fff;
            text-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        .welcome h2 {
            margin: 0;
            font-size: 2rem;
            font-weight: 700;
        }
        .welcome p {
            margin: 8px 0 0 0;
            font-size: 1.1rem;
            font-weight: 400;
        }
        .right {
            flex: 1;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            width: 100%;
            max-width: 370px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07);
            padding: 32px 28px;
            text-align: center;
        }
        .login-box img {
            width: 70px;
            margin-bottom: 18px;
        }
        .login-box h3 {
            font-size: 1.3rem;
            margin-bottom: 8px;
            font-weight: 700;
        }
        .login-box .desc {
            font-size: 0.98rem;
            color: #555;
            margin-bottom: 18px;
        }
        .login-box form {
            text-align: left;
        }
        .login-box label {
            font-size: 0.97rem;
            font-weight: 600;
            margin-bottom: 4px;
            display: block;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 12px;
            font-size: 1rem;
        }
        .login-box .forgot {
            display: block;
            text-align: right;
            font-size: 0.95rem;
            margin-bottom: 14px;
            color: #007bff;
            text-decoration: none;
        }
        .login-box button[type="submit"] {
            width: 100%;
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 0;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .login-box .powered {
            margin-top: 18px;
            font-size: 0.92rem;
            color: #888;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .login-box .powered img {
            width: 60px;
            margin: 0;
        }
        @media (max-width: 900px) {
            .container { flex-direction: column; }
            .left, .right { flex: unset; width: 100%; }
            .welcome { position: static; margin: 24px 0 0 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <img src="/images/sttnf-building.jpg" alt="STT-NF">
            <div class="welcome">
                <span style="color: #d4ff00; font-weight: bold;">SELAMAT DATANG</span>
                <h2>Sistem Informasi Akademik</h2>
                <p><b>Sekolah Tinggi Teknologi Terpadu<br>Nurul Fikri</b></p>
            </div>
        </div>
        <div class="right">
            <div class="login-box">
                <img src="/images/sttnf-logo.png" alt="STT-NF Logo">
                <h3>Masuk dan Verifikasi</h3>
                <div class="desc">
                    <b>Baru!</b> Nikmati kemudahan sistem autentikasi tunggal untuk mengakses semua layanan dengan satu akun.
                </div>
                @if(session('error'))
                    <div style="color:red; margin-bottom:10px;">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email">Email/akun pengguna<span style="color:red">*</span></label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div style="color:red; font-size:0.95rem;">{{ $message }}</div>
                    @enderror

                    <label for="password">Password<span style="color:red">*</span></label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <div style="color:red; font-size:0.95rem;">{{ $message }}</div>
                    @enderror

                    <a href="{{ route('password.request') }}" class="forgot">Lupa kata sandi?</a>
                    <button type="submit">Masuk</button>
                </form>
                <div class="powered">
                    Powered by
                    <img src="/images/sevima-logo.png" alt="SEVIMA">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
