<x-app-layout>

<div class="flex">

<!-- Sidebar -->

<div class="w-64 min-h-screen bg-white shadow">

<div class="p-6 text-xl font-bold text-blue-600">
Admin Panel
</div>

<nav class="mt-6">

<a href="{{ route('admin.dashboard') }}"
class="block px-6 py-3 hover:bg-gray-100">
Dashboard
</a>

<a href="{{ route('admin.approve_teachers') }}"
class="block px-6 py-3 hover:bg-gray-100">
Approve Guru
</a>

<a href="{{ route('admin.teacher_profiles') }}"
class="block px-6 py-3 hover:bg-gray-100">
Approve Profil Guru
</a>

</nav>

</div>

<!-- Content -->

<div class="flex-1 p-8">

@yield('content')

</div>

</div>

</x-app-layout>