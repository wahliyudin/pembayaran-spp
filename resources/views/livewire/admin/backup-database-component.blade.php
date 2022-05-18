<div class="px-4 py-8 w-full">
    @include('layouts.inc.loading')
    <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded flex flex-col items-center">
        @if (session()->has('error'))
            <span class="text-red-500 text-sm">{{ session('error') }}</span>
        @endif
        <div class="p-6 shadow-md rounded flex flex-col space-y-4 items-center">
            <div class="bg-red-500 rounded flex items-center flex-col p-2 animate-bounce">
                <span class="font-semibold text-white">PERINGATAN!</span>
                <p class="font-semibold text-white">Halaman ini digunakan untuk membackup seluruh database</p>
            </div>

            <i class='bx bxs-data text-green-600' style="font-size: 150px;"></i>

            <a href="{{ route('backup') }}"
                class="text-white bg-yellow-600 font-semibold px-4 py-2 uppercase rounded flex items-center"><i
                    class='bx bxs-data text-xl mr-1'></i> backup
                database
                aplikasi</a>
        </div>
    </div>
</div>
