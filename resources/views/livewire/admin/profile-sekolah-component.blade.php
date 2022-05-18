<div class="px-4 py-8 w-full">
    @include('layouts.inc.loading')
    <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded">
        <div class="flex justify-between gap-x-6 w-full">
            <div class="flex flex-col space-y-4 w-1/3">
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold text-sm">Tingkat Sekolah</label>
                    <input type="text" wire:model='level' class="border-gray-400 text-sm rounded-sm"
                        placeholder="Tingkat sekolah">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold text-sm">Nama Sekolah</label>
                    <input type="text" wire:model='name' class="border-gray-400 text-sm rounded-sm"
                        placeholder="Nama sekolah">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold text-sm">Alamat Sekolah</label>
                    {{-- <input type="text" wire:model='address' class="border-gray-400 text-sm rounded-sm"
                        placeholder="Alamat sekolah"> --}}
                    <textarea wire:model='address' class="border-gray-400 text-sm rounded-sm" placeholder="Alamat sekolah"></textarea>
                </div>
            </div>
            <div class="flex flex-col space-y-4 w-1/3">
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold text-sm">Nama Kecamatan</label>
                    <input type="text" wire:model='districts' class="border-gray-400 text-sm rounded-sm"
                        placeholder="Nama kecamatan">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold text-sm">Nama Kota/Kab</label>
                    <input type="text" wire:model='city' class="border-gray-400 text-sm rounded-sm"
                        placeholder="Nama Kota/kab">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold text-sm">Nomor Telepon</label>
                    <input type="text" wire:model='phone' class="border-gray-400 text-sm rounded-sm"
                        placeholder="No telp">
                </div>

                <div class="flex">
                    <button wire:click="store" class="bg-gray-700 text-white px-4 py-2 rounded text-sm">Simpan
                        Data</button>
                </div>
            </div>
            <div class="flex flex-col space-y-4 w-1/3">
                <div class="flex flex-col space-y-2">
                    <label for="" class="font-semibold text-sm">Logo Sekolah</label>
                    <img src="{{ asset($logo) }}" class="w-36 h-36 object-contain rounded-full self-center" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
