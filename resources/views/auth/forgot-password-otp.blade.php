<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6ea8fe);
            height: 100vh;
        }
        .card {
            border-radius: 15px;
        }
        .form-section {
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 420px;">
        
        <h4 class="text-center mb-3">🔐 Lupa Password</h4>

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- ALERT ERROR --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- STEP 1: KIRIM OTP --}}
        <div class="form-section">
            <h6 class="mb-3">Kirim Kode OTP</h6>

            <form method="POST" action="{{ route('send.otp') }}">
                @csrf

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                </div>

                <button class="btn btn-primary w-100">
                    Kirim OTP
                </button>
            </form>
        </div>

        {{-- STEP 2: RESET PASSWORD --}}
        <div>
            <h6 class="mb-2">Reset Password</h6>

            {{-- tampilkan email tujuan --}}
            @if(session('email_otp'))
                <p class="text-muted text-center small">
                    OTP dikirim ke: <b>{{ session('email_otp') }}</b>
                </p>
            @endif

            <form method="POST" action="{{ route('verify.otp') }}">
                @csrf

                {{-- EMAIL DIAMBIL DARI SESSION --}}
                <input type="hidden" name="email" value="{{ session('email_otp') }}">

                <div class="mb-2">
                    <label>Kode OTP</label>
                    <input type="text" name="otp" class="form-control" placeholder="6 digit OTP" required>
                </div>

                <div class="mb-2">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button class="btn btn-success w-100">
                    Reset Password
                </button>
            </form>
        </div>

    </div>
</div>

</body>
</html>