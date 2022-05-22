<div class="px-4 py-8 w-full">
    @include('layouts.inc.loading')
    <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded">
        <div class="flex flex-col">
            <div class="flex justify-between items-center">
                <button class="bg-gray-700 text-white px-4 py-2 rounded text-sm" wire:click="create">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Data
                </button>
                {{-- <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input datepicker datepicker-format="yyyy" datepicker-autohide type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                </div> --}}
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
                                        Tahun Pelajaran
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($school_years as $item)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->year_start . ' / ' . $item->year_end }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-1">
                                                <button class="bg-yellow-600 text-white px-2 py-2 rounded flex"
                                                    wire:click="edit('{{ $item->id }}')">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button class="bg-red-600 text-white px-2 py-2 rounded flex"
                                                    wire:click="delete('{{ $item->id }}')">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                                {{-- <button class="bg-green-600 text-white px-2 py-2 rounded flex">
                                                    <i class="fa-solid fa-check"></i>
                                                </button> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex">
                {{ $school_years->links('vendor.livewire.tailwind') }}
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Tambah Tahun Pelajaran
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Tahun Pelajaran</label>
                    <input type="number" wire:model='year_start' id="" class="rounded py-2 px-2"
                        placeholder="Tahun Pelajaran">
                    @error('year_start')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <input type="number" wire:model='year_end' readonly id="" class="rounded py-2 px-2 bg-gray-100 mt-8"
                        placeholder="Tahun Pelajaran">
                    @error('year_end')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col space-y-1 col-span-2">
                    <label for="" class="font-semibold">Status</label>
                    <select wire:model='status' id="" class="rounded py-2 px-2">
                        <option selected>-- pilih --</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            @if (isset($school_year_model))
                <button wire:click="update" class="text-white bg-blue-500 px-4 py-2 rounded">Update</button>
            @else
                <button wire:click="store" class="text-white bg-blue-500 px-4 py-2 rounded">Simpan</button>
            @endif

            <x-jet-danger-button class="ml-2" wire:click="closeModal">
                Batal
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />
    @endpush
    @push('js')
        <script src="https://unpkg.com/flowbite@1.4.5/dist/datepicker.js"></script>
    @endpush
</div>
