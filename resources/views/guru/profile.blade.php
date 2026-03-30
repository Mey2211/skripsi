<x-app-layout>

<div class="max-w-4xl mx-auto mt-10">

<h2 class="text-2xl font-bold mb-6">Profil Guru</h2>

<form method="POST" action="{{ route('guru.profile.store') }}">
@csrf

<div class="mb-4">
<label>Mata Pelajaran</label>
<input type="text" name="subject" class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Jenjang</label>
<select name="jenjang" class="w-full border rounded p-2">
<option value="SD">SD</option>
<option value="SMP">SMP</option>
<option value="SMA">SMA</option>
</select>
</div>

<div class="mb-4">
<label>Pengalaman Mengajar (tahun)</label>
<input type="number" name="experience" class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Pendidikan</label>
<input type="text" name="education" class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Harga Les</label>
<input type="number" name="price" class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Availability</label>
<input type="text" name="availability" class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Gender</label>
<select name="gender" class="w-full border rounded p-2">
<option value="male">Laki-laki</option>
<option value="female">Perempuan</option>
</select>
</div>

<div class="mb-4">
<label>Detail</label>
<input type="text" name="detail" class="w-full border rounded p-2">
</div>

<button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded">
Simpan Profil
</button>

</form>

</div>

</x-app-layout>