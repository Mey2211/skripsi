@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">
Approve Profil Guru
</h2>

<table class="min-w-full bg-white shadow rounded">

<tr class="border-b">

<th class="p-3">Nama Guru</th>
<th class="p-3">Mata Pelajaran</th>
<th class="p-3">Harga</th>
<th class="p-3">Aksi</th>

</tr>

@foreach($profiles as $profile)

<tr class="border-b">

<td class="p-3">{{ $profile->user->name }}</td>
<td class="p-3">{{ $profile->subject }}</td>
<td class="p-3">Rp {{ number_format($profile->price) }}</td>

<td class="p-3">

<a href="{{ route('admin.approve_profile',$profile->id) }}"
class="bg-green-600 text-white px-3 py-1 rounded">

Approve

</a>

</td>

</tr>

@endforeach

</table>

@endsection