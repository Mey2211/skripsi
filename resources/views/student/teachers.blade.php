<x-app-layout>

<div class="max-w-7xl mx-auto py-10 px-6">

    <h1 class="text-3xl font-bold text-gray-800 mb-8">
        Daftar Guru
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($teachers as $teacher)

        <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">

            <!-- Foto Guru -->
            <div class="flex items-center gap-4 mb-4">

                <div class="w-14 h-14 bg-gray-200 rounded-full flex items-center justify-center text-xl font-bold text-gray-600">
                    {{ substr($teacher->user->name,0,1) }}
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        {{ $teacher->user->name }}
                    </h2>

                    <p class="text-sm text-gray-500">
                        {{ $teacher->subject }}
                    </p>
                </div>

            </div>

            <!-- Detail Guru -->

            <div class="space-y-2 text-sm text-gray-600">

                <p>
                    🎓 <span class="font-medium">Pendidikan:</span>
                    {{ $teacher->education }}
                </p>

                <p>
                    💼 <span class="font-medium">Pengalaman:</span>
                    {{ $teacher->experience }}
                </p>

                <p>
                    ⏰ <span class="font-medium">Availability:</span>
                    {{ $teacher->availability }}
                </p>

                <p class="text-green-600 font-semibold">
                    Rp {{ number_format($teacher->price) }} / sesi
                </p>

            </div>

            <!-- Button -->

            <div class="mt-5">

                <a href="#"
                   class="block text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                   Lihat Detail
                </a>

            </div>

        </div>

        @endforeach

    </div>

</div>

</x-app-layout>