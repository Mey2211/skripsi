<x-app-layout>

<div class="max-w-4xl mx-auto py-10">

<div class="bg-white shadow rounded-xl p-8">

<div class="flex items-center mb-6">

<div class="w-16 h-16 bg-blue-500 text-white flex items-center justify-center rounded-full text-xl font-bold">

{{ strtoupper(substr($teacher->user->name,0,1)) }}

</div>

<div class="ml-4">

    <h2 class="text-2xl font-bold">
    {{ $teacher->user->name }}
    </h2>

    <p class="text-gray-500">
    Tutor
    </p>

</div>

</div>


<div class="grid grid-cols-2 gap-6 mb-6">

<div>

    <p class="text-gray-500">
    Mata Pelajaran
    </p>
    <p class="font-semibold">
    {{ $teacher->subject }}
    </p>

    <p class="text-gray-500">
    Jenjang
    </p>
    <p class="font-semibold">
    {{ $teacher->jenjang }}
    </p>

    <p class="text-gray-500">
    Pendidikan
    </p>
    <p class="font-semibold">
    {{ $teacher->education }}
    </p>


    <p class="text-gray-500">
    Gender
    </p>
    <p class="font-semibold">
    {{ $teacher->gender }}
    </p>

</div>

<div>

    <p class="text-gray-500">
    Harga
    </p>

    <p class="text-green-600 font-bold text-lg">
    Rp {{ number_format($teacher->price) }}
    </p>

</div>

</div>


<div class="mb-6">

    <h3 class="font-semibold mb-2">
    Deskripsi
    </h3>
    <p class="font-semibold">
    {{ $teacher->detail }}
    </p>

</div>

<a href="/dashboard"
class="bg-gray-200 px-4 py-2 rounded">

Kembali

</a>

</div>

</div>

</x-app-layout>