<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tutor Recommendation System</title>
@vite('resources/css/app.css')
</head>

<body class="bg-gray-50">

<!-- Navbar -->

<nav class="bg-white shadow">
<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">

<h1 class="text-xl font-bold text-blue-600">
Tutor Recommendation
</h1>

<div class="space-x-4">

@auth
<a href="{{ route('dashboard') }}"
class="text-gray-700 hover:text-blue-600">Dashboard</a>
@else
<a href="{{ route('login') }}"
class="text-gray-700 hover:text-blue-600">Login</a>

<a href="{{ route('register') }}"
class="bg-blue-600 text-white px-4 py-2 rounded-lg">
Register
</a>
@endauth

</div>

</div>
</nav>

<!-- Hero Section -->

<section class="py-20 text-center bg-white">

<h1 class="text-4xl font-bold text-gray-800 mb-4">
Temukan Guru Terbaik Untuk Belajar
</h1>

<p class="text-gray-500 mb-6">
Platform rekomendasi guru berbasis sistem hybrid untuk membantu siswa menemukan tutor terbaik.
</p>

<a href="{{ route('teachers') }}"
class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">

Cari Guru Sekarang

</a>

</section>


<!-- Fitur Sistem -->

<section class="py-16">

<div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8 px-6">

<div class="bg-white p-6 rounded-xl shadow text-center">

<h3 class="font-semibold text-lg mb-2">
Rekomendasi Guru
</h3>

<p class="text-gray-500 text-sm">
Sistem memberikan rekomendasi guru terbaik berdasarkan kebutuhan siswa.
</p>

</div>

<div class="bg-white p-6 rounded-xl shadow text-center">

<h3 class="font-semibold text-lg mb-2">
Guru Berkualitas
</h3>

<p class="text-gray-500 text-sm">
Semua guru telah diverifikasi oleh admin sebelum tampil di sistem.
</p>

</div>

<div class="bg-white p-6 rounded-xl shadow text-center">

<h3 class="font-semibold text-lg mb-2">
Belajar Fleksibel
</h3>

<p class="text-gray-500 text-sm">
Siswa dapat memilih guru berdasarkan jadwal dan harga yang sesuai.
</p>

</div>

</div>

</section>


<!-- Preview Guru -->

<section class="py-16 bg-gray-100">

<div class="max-w-7xl mx-auto px-6">

<h2 class="text-2xl font-bold mb-8 text-center">
Guru Populer
</h2>

<div class="grid md:grid-cols-3 gap-6">

@foreach($teachers ?? [] as $teacher)

<div class="bg-white p-6 rounded-xl shadow">

<h3 class="font-semibold text-lg">
{{ $teacher->user->name }}
</h3>

<p class="text-gray-500 text-sm">
{{ $teacher->subject }}
</p>

<p class="text-green-600 font-semibold mt-2">
Rp {{ number_format($teacher->price) }}
</p>

</div>

@endforeach

</div>

</div>

</section>


<!-- Footer -->

<footer class="bg-white border-t py-6 text-center text-gray-500">

© {{ date('Y') }} Tutor Recommendation System

</footer>

</body>
</html>