<div class="px-4 py-8 w-full space-y-4">
    @include('layouts.inc.loading')
    <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded">
        <div class="flex flex-col">
            <span class="pb-4 font-semibold">Tarif - {{ $type_of_payment->type_payment }}</span>

            <div class="grid grid-cols-3 gap-6 border-t border-gray-700 py-4">
                <div class="flex space-x-4 items-center">
                    <label for="" class="font-semibold">Tahun</label>
                    <input type="text" class="rounded text-sm bg-gray-300"
                        value="{{ $type_of_payment->schoolYear->year_start . ' / ' . $type_of_payment->schoolYear->year_end }}"
                        readonly placeholder="tahun">
                </div>
                <div class="flex space-x-4 items-center">
                    <label for="" class="font-semibold">Kelas</label>
                    <select wire:model='filter.data_class_id' id="" class="rounded py-2 px-2">
                        <option selected value="">-- pilih kelas --</option>
                        @foreach ($data_classes as $data_class)
                            <option value="{{ $data_class->id }}">{{ $data_class->name }}</option>
                        @endforeach
                    </select>
                    @error('filter.data_class_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex space-x-4 items-center">
                    <label for="" class="font-semibold">Jurusan</label>
                    <select wire:model='filter.major_id' id="" class="rounded py-2 px-2">
                        <option selected value="">-- pilih jurusan --</option>
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                    @error('filter.major_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex space-x-2 items-center border-t border-gray-700 pt-4">
                <a href="{{ route('jenis-pembayaran') }}"
                    class="text-white pl-3 pr-4 py-1 rounded bg-red-700 flex items-center text-sm"><i
                        class='bx bx-arrow-back mr-2 text-xl'></i> Kembali</a>
                <button class="text-white pl-3 pr-4 py-1 rounded bg-blue-700 flex items-center text-sm"><i
                        class='bx bx-plus mr-2 text-xl'></i> Berdasarkan Kelas</button>
                <button class="text-white pl-3 pr-4 py-1 rounded bg-yellow-700 flex items-center text-sm"><i
                        class='bx bx-plus mr-2 text-xl'></i> Berdasarkan Jurusan</button>
                <button class="text-white pl-3 pr-4 py-1 rounded bg-purple-700 flex items-center text-sm"
                    wire:click="create"><i class='bx bx-plus mr-2 text-xl'></i> Berdasarkan Siswa</button>
            </div>
        </div>
    </div>
    <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded">
        <div class="flex flex-col">
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
                                        Program
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Tagihan
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($frees as $item)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->student_nim }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->student_name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->data_class_name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->major_name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            Rp. {{ number_format($item->free_bill, 0, ',', '.') }}
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
                {{ $frees->links('vendor.livewire.tailwind') }}
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modal" maxWidth="5xl">
        <x-slot name="title">
            Tambah Tarif Pembayaran
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col space-y-4 border-t-2 border-red-700 rounded shadow px-4 py-4">
                    <span>Informasi Pembayaran</span>

                    <div class="flex justify-between items-center">
                        <label for="" class="font-semibold">Jenis Pembayaran</label>
                        <input type="text" class="text-sm bg-gray-300 rounded w-2/3" readonly
                            value="{{ $type_of_payment->type_payment }}">
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="" class="font-semibold">Tahun Pelajaran</label>
                        <input type="text" class="text-sm bg-gray-300 rounded w-2/3" readonly
                            value="{{ $type_of_payment->schoolYear->year_start . ' / ' . $type_of_payment->schoolYear->year_end }}">
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="" class="font-semibold">Tipe Pembayaran</label>
                        <input type="text" class="text-sm bg-gray-300 rounded w-2/3" readonly
                            value="{{ $type_of_payment->type }}">
                    </div>
                </div>
                <div class="flex flex-col space-y-4 border-t-2 border-gray-700 rounded shadow px-4 py-4">
                    <span>Tarif Tagihan Per Siswa</span>

                    <div class="flex justify-between items-center">
                        <label for="" class="font-semibold">Kelas</label>
                        <select wire:model='data_class_id' id="" {{ isset($free) ? 'disabled' : '' }}
                            class="rounded py-2 px-2 w-2/3">
                            <option selected>-- pilih kelas --</option>
                            @foreach ($data_classes as $data_class)
                                <option value="{{ $data_class->id }}">{{ $data_class->name }}</option>
                            @endforeach
                        </select>
                        @error('data_class_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (isset($students))
                        <div class="flex justify-between items-center">
                            <label for="" class="font-semibold">Siswa</label>
                            <select wire:model='student_id' id="" {{ isset($free) ? 'disabled' : '' }}
                                class="rounded py-2 px-2 w-2/3">
                                <option selected>-- pilih siswa --</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    <div class="flex justify-between items-center">
                        <label for="" class="font-semibold">Tarif (Rp.)</label>
                        <input type="number" class="text-sm rounded py-2 px-2 w-2/3" wire:model="free_bill">
                        @error('free_bill')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="flex justify-between items-center">
                        <label for="" class="font-semibold">Keterangan</label>
                        <textarea class="text-sm rounded py-2 px-2 w-2/3" wire:model="description"></textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div> --}}
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            @if (isset($free))
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
