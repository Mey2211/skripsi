@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">
Approve Guru
</h2>

<table class="min-w-full bg-white shadow rounded">

<tr class="border-b">
<th class="p-3">Nama</th>
<th class="p-3">Email</th>
<th class="p-3">Aksi</th>
</tr>

@foreach($teachers as $teacher)

<tr class="border-b">

<td class="p-3">{{ $teacher->name }}</td>
<td class="p-3">{{ $teacher->email }}</td>

<td class="p-3">

<a href="{{ route('admin.approve',$teacher->id) }}"
class="bg-green-600 text-white px-3 py-1 rounded">

Approve

</a>

</td>

</tr>

@endforeach

</table>

@endsection