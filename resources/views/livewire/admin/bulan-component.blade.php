<div class="px-4 py-8 w-full">
    @include('layouts.inc.loading')
    <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded">
        <div class="flex flex-col">
            <div class="flex justify-between items-center">
                <button class="bg-gray-700 text-white px-4 py-2 rounded text-sm" wire:click="create">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Data
                </button>
            </div>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="bg-white border-b">
                                <tr>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        No
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Nama Bulan
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($months as $item)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                            {{ $item->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                            <button class="bg-yellow-600 text-white px-2 py-2 rounded flex"
                                                wire:click="edit('{{ $item->id }}')">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex">
                {{ $months->links('vendor.livewire.tailwind') }}
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Tambah Bulan
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6">
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Nama Bulan</label>
                    <input type="text" wire:model='name' id="" class="rounded py-2 px-2" placeholder="nama bulan">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            @if (isset($month))
                <button wire:click="update" class="text-white bg-blue-500 px-4 py-2 rounded">Update</button>
            @else
                <button wire:click="store" class="text-white bg-blue-500 px-4 py-2 rounded">Simpan</button>
            @endif

            <x-jet-danger-button class="ml-2" wire:click="closeModal">
                Batal
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
