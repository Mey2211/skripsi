<x-app-layout>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <h1 class="text-2xl font-bold">
                    Dashboard Guru
                </h1>

                <p class="mt-3">
                    Selamat datang {{ Auth::user()->name }}
                </p>

                <p class="mt-2">
                    Anda login sebagai <b>Guru</b>
                </p>
                <div class="mt-6">

                    <a href="{{ route('guru.profile') }}" 
                    class="bg-blue-600 text-white px-4 py-2 rounded">

                    Lengkapi Profil Guru

                    </a>

                    </div>
            </div>

        </div>
    </div>

</x-app-layout>