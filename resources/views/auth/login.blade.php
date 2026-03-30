<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-100">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

<h2 class="text-2xl font-bold text-center mb-6">
Login Akun
</h2>

@if(session('error'))
<div class="bg-red-100 text-red-700 p-3 rounded mb-4">
{{ session('error') }}
</div>
@endif

<form method="POST" action="{{ route('login') }}" autocomplete="off">

@csrf

<div class="mb-4">
    <label class="block text-gray-700 mb-2">Email</label>
    <input type="email" name="email" value="{{ old('email') }}"
    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
</div>

<div class="mb-6 relative">
    <label class="block text-gray-700 mb-2">Password</label>

    <input 
        type="password" 
        name="password"
        id="password"
        autocomplete="new-password"
        class="w-full border rounded-lg px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500"
    >

    <span onclick="togglePassword()" 
        class="absolute right-3 top-10 cursor-pointer text-gray-500">
        <i id="eyeIcon" class="fa fa-eye"></i>
    </span>
</div>

<a href="{{ route('forgot.password.otp') }}"class="text-blue-600">
Lupa Password?
</a>
<button
class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
Login
</button>

</form>

<p class="text-sm text-center mt-4">
Belum punya akun?
<a href="{{ route('register') }}" class="text-blue-600">
Register
</a>
</p>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    @endif

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
        });
    @endif
</script>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");

    if (password.type === "password") {
        password.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        password.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
</div>

</div>

</x-guest-layout>