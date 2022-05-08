<div class="px-4 py-8 w-full">
    <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded">
        <div class="flex flex-col">
            <div class="flex justify-between items-center">
                <div class="flex space-x-1 items-center">
                    <button class="bg-red-700 text-white px-4 py-2 rounded text-sm">
                        <i class="fa-solid fa-print"></i>
                        Cetak Kartu
                    </button>
                    <button class="bg-gray-700 text-white px-4 py-2 rounded text-sm" wire:click="create">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Data
                    </button>
                    <button class="bg-blue-700 text-white px-4 py-2 rounded text-sm">
                        <i class="fa-solid fa-upload"></i>
                        Upload Siswa
                    </button>
                </div>
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
                                        NIM
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Nama
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Kelas
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Jurusan
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
                                @foreach ($students as $item)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration }}</td>
                                        <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                            {{ $item->nim }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                            {{ $item->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                            {{ $item->dataClass->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                            {{ $item->major->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                            {!! $item->status ? '<span class="text-white bg-green-600 px-2 py-1 rounded">aktif</span>' : '<span class="text-white bg-red-600 px-2 py-1 rounded">tidak aktif</span>' !!}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-1">
                                                <button class="bg-red-600 text-white px-2 py-2 rounded flex"
                                                    wire:click="delete('{{ $item->id }}')">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                                <button class="bg-blue-600 text-white px-2 py-2 rounded flex">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <button class="bg-yellow-600 text-white px-2 py-2 rounded flex"
                                                    wire:click="edit('{{ $item->id }}')">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
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
                {{ $students->links('vendor.livewire.tailwind') }}
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Tambah Peserta Didik
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">NIM</label>
                    <input type="number" wire:model='nim' id="" class="rounded py-2 px-2" placeholder="NIM">
                    @error('nim')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Nama</label>
                    <input type="text" wire:model='name' id="" class="rounded py-2 px-2" placeholder="Nama">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Kelas</label>
                    <select wire:model='data_class_id' id="" class="rounded py-2 px-2">
                        <option selected>-- pilih --</option>
                        @foreach ($data_classes as $data_class)
                            <option value="{{ $data_class->id }}">{{ $data_class->name }}</option>
                        @endforeach
                    </select>
                    @error('data_class_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
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
                <div class="flex flex-col space-y-1 col-span-2">
                    <label for="" class="font-semibold">Jurusan</label>
                    <select wire:model='major_id' id="" class="rounded py-2 px-2">
                        <option selected>-- pilih --</option>
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                    @error('major_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            @if (isset($student))
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
