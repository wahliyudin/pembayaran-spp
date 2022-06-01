<div class="px-4 py-8 w-full space-y-4 relative">
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
                <a href="{{ route('tarif-pembayaran-kelas', Crypt::encrypt($type_of_payment->id)) }}"
                    class="text-white pl-3 pr-4 py-1 rounded bg-blue-700 flex items-center text-sm"><i
                        class='bx bx-plus mr-2 text-xl'></i> Berdasarkan Kelas</a>
                <a href="{{ route('tarif-pembayaran-jurusan', Crypt::encrypt($type_of_payment->id)) }}"
                    class="text-white pl-3 pr-4 py-1 rounded bg-yellow-700 flex items-center text-sm"><i
                        class='bx bx-plus mr-2 text-xl'></i> Berdasarkan Jurusan</a>
                <a href="{{ route('tarif-pembayaran-siswa', Crypt::encrypt($type_of_payment->id)) }}"
                    class="text-white pl-3 pr-4 py-1 rounded bg-purple-700 flex items-center text-sm"><i
                        class='bx bx-plus mr-2 text-xl'></i> Berdasarkan Siswa</a>
            </div>
        </div>
    </div>
    <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded">
        <div class="flex flex-col">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <span class="text-sm">Perpage :</span>
                    <select wire:model='per_page' class="text-sm rounded px-2 py-1 w-32">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="flex items-center space-x-2 w-1/3">
                    <span class="text-sm">Search :</span>
                    <input wire:model="search" type="search" class="text-sm rounded px-2 py-1 flex-grow">
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
                                        Program
                                    </th>
                                    <th scope="col" class="text-gray-900 px-6 py-4 text-left">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($monthlies as $item)
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
                                            <div class="flex items-center space-x-1">
                                                {{-- <button class="bg-yellow-600 text-white px-2 py-2 rounded flex"
                                                    wire:click="edit('{{ $item->id }}')">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button> --}}
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
                {{ $monthlies->links('vendor.livewire.tailwind') }}
            </div>
        </div>
    </div>
</div>
