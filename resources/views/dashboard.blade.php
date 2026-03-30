<x-app-layout>

<div class="max-w-7xl mx-auto py-10">

<h2 class="text-3xl font-bold mb-2">
Halo, {{ Auth::user()->name }} 👋
</h2>

<p class="text-gray-500 mb-8">
Temukan guru terbaik untuk membantu proses belajar Anda.
</p>

<!-- Search -->

<div class="mb-8">

<input type="text" placeholder="Cari guru atau mata pelajaran..."
class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">

</div>

<form method="GET" action="/dashboard" class="mb-8 bg-white p-6 rounded-xl shadow">

<div class="grid grid-cols-4 gap-4">

<input type="text" name="subject" placeholder="Mata Pelajaran"
class="border p-2 rounded">

<input type="number" name="max_price" placeholder="Harga Maksimal"
class="border p-2 rounded">

<select name="gender" class="border p-2 rounded">
<option value="">Pilih Gender Guru</option>
<option value="male">male</option>
<option value="female">female</option>
</select>

<button class="bg-blue-600 text-white rounded px-4">
Cari Guru
</button>

</div>

</form>

<!-- Daftar Guru -->

<h3 class="text-2xl font-semibold mb-6">
Daftar Guru
</h3>

<div class="grid md:grid-cols-3 gap-6">

@foreach($teachers as $teacher)

<div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6">

<div class="flex items-center mb-4">

<div class="w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full font-bold">

{{ strtoupper(substr($teacher->user->name,0,1)) }}

</div>

<div class="ml-3">

<h4 class="font-semibold">
{{ $teacher->user->name }}
</h4>

<p class="text-sm text-gray-500">
Tutor
</p>

</div>

</div>

<p class="text-gray-600 mb-2">
Mata Pelajaran:
<span class="font-medium">
{{ $teacher->subject }}
</span>
</p>

<p class="text-green-600 font-bold text-lg mb-4">
Rp {{ number_format($teacher->price) }}
</p>

<a href="{{ route('teacher.detail', $teacher->id) }}"
class="block text-center w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">

Lihat Detail Guru

</a>

</div>

@endforeach

</div>

</div>

</x-app-layout>