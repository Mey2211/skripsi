<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-100">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

<h2 class="text-2xl font-bold text-center mb-6">
Daftar Akun
</h2>

<form method="POST" action="{{ route('register') }}">

@csrf

<div class="mb-4">
<label class="block text-gray-700 mb-2">Nama</label>
<input type="text" name="name"
class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
</div>
@error('email')
    <div style="color:red;">
        {{ $message }}
    </div>
@enderror

<div class="mb-4">
<label class="block text-gray-700 mb-2">Email</label>
<input type="email" name="email"
class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
</div>

<div class="mb-4">
<label class="block text-gray-700 mb-2">Password</label>
<input type="password" name="password"
class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
</div>

<div class="mb-4">
<label class="block text-gray-700 mb-2">Konfirmasi Password</label>
<input type="password" name="password_confirmation"
class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
</div>

<div class="mb-6">

<label class="block text-gray-700 mb-2">Daftar Sebagai</label>

<select name="role"
class="w-full border rounded-lg px-3 py-2">

<option value="siswa">Siswa</option>
<option value="guru">Guru</option>

</select>

</div>

<button
class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">

Register

</button>

</form>

<p class="text-sm text-center mt-4">

Sudah punya akun?

<a href="{{ route('login') }}" class="text-blue-600">
Login
</a>

</p>

</div>

</div>

</x-guest-layout>