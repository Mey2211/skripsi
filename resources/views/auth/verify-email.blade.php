<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Email Verification | RekoBimbel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#0d6efd,#4e73df);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family: 'Segoe UI', sans-serif;
}

.verify-card{
    border-radius:15px;
    padding:40px;
}

.logo-title{
    font-weight:700;
    font-size:28px;
    color:#0d6efd;
}

.subtitle{
    color:#6c757d;
}

</style>
</head>

<body>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card shadow-lg verify-card">

<div class="text-center mb-4">

<h2 class="logo-title">RekoBimbel</h2>
<p class="subtitle">Teacher Recommendation Platform</p>

</div>

<div class="text-center">

<h4 class="mb-3">Verify Your Email Address</h4>

<p class="text-muted">
Thank you for registering! Before getting started, please verify your email address by clicking the link we just emailed to you.
</p>

</div>

@if (session('message'))
<div class="alert alert-success text-center mt-3">
{{ session('message') }}
</div>
@endif

<div class="text-center mt-4">

<form method="POST" action="{{ route('verification.send') }}">
@csrf

<button class="btn btn-primary px-4">
Resend Verification Email
</button>

</form>

</div>

<div class="text-center mt-4">

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="btn btn-outline-secondary btn-sm">
        Logout
    </button>
</form>
</form>

</div>

</div>

</div>
</div>
</div>

</body>
</html>