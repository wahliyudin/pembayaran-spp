<div class="px-4 py-8 w-full flex flex-col space-y-6">
    <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded">
        <div class="flex flex-col">
            <div class="flex items-center justify-between">
                <span class="font-semibold">Filter Transaksi Pembayaran
                    {{ $filter['school_year_id'] . ',' . $filter['student_nim'] }}</span>

                <a href="{{ route('peserta-didik') }}"
                    class="text-white bg-green-700 rounded pl-3 pr-4 py-2 flex items-center text-xs"><i
                        class='bx bx-menu text-sm mr-2'></i> Referensi Data Siswa</a>
            </div>

            <span class="my-3 h-0.5 rounded-full bg-gray-300"></span>

            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col space-y-2">
                    <label for="">Pilih Tahun Pelajaran</label>
                    <select wire:model='filter.school_year_id' class="rounded text-sm py-2 px-4">
                        <option selected>-- pilih tahun --</option>
                        @foreach ($school_years as $school_year)
                            <option value="{{ $school_year->id }}">
                                {{ $school_year->year_start . ' / ' . $school_year->year_end }}</option>
                        @endforeach
                    </select>
                    @error('filter.school_year_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="">Input Berdasarkan NIM Siswa</label>
                    <input type="number" wire:model='filter.student_nim' class="rounded text-sm"
                        placeholder="121332...">
                    @error('filter.student_nim')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    @if (isset($student))
        <div class="bg-white shadow px-4 py-4 w-full border-t-2 border-gray-700 rounded">
            <div class="flex flex-col">
                <div class="flex items-center justify-between">
                    <span class="font-semibold">Informasi Siswa</span>

                    <button class="text-white bg-yellow-700 rounded pl-3 pr-4 py-2 flex items-center text-xs"><i
                            class='bx bxs-printer text-sm mr-2'></i> Cetak Semua Tagihan</button>
                </div>

                <div class="flex space-x-6 mt-6">
                    <div class="flex flex-col w-full">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <tbody>
                                            <tr class="bg-white border-b">
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    Tahun Ajaran
                                                </td>
                                                <td class="text-left">
                                                    :
                                                </td>
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    {{ $school_year->year_start . ' / ' . $school_year->year_end }}
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-100 border-b">
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    NIM
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    {{ $student->nim }}
                                                </td>
                                            </tr>
                                            <tr class="bg-white border-b">
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    Nama Siswa
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    {{ $student->name }}
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-100 border-b">
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    Nama Ibu Kandung
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    -
                                                </td>
                                            </tr>
                                            <tr class="bg-white border-b">
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    Kelas
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    {{ $student->dataClass->name }}
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-100 border-b">
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    Jurusan
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td class="text-sm text-gray-900 px-6 py-2 whitespace-nowrap">
                                                    {{ $student->major->name }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="flex gap-6 mt-6 items-start">
            <div class="bg-white shadow px-4 py-4 w-2/3 border-t-2 border-gray-700 rounded">
                <div class="flex flex-col">
                    <span class="font-semibold">Transaksi Terakhir</span>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                            <tr class="border-b bg-yellow-100 border-yellow-200">
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-2 text-left">
                                                    Pembayaran
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-2 text-left">
                                                    Tagihan
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-2 text-left">
                                                    Tanggal
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    1
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    Mark
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @mdo
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow px-4 py-4 w-2/4 border-t-2 border-gray-700 rounded">
                <div class="flex flex-col">
                    <span class="font-semibold">Pembayaran</span>

                    <div class="flex flex-col space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex flex-col space-y-1">
                                <label for="">Total</label>
                                <input type="text" class="rounded text-sm px-2 py-1 w-full">
                            </div>
                            <div class="flex flex-col space-y-1">
                                <label for="">Dibayar</label>
                                <input type="text" class="rounded text-sm px-2 py-1 w-full">
                            </div>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="">Kembalian</label>
                            <input type="text" class="rounded text-sm px-2 py-1 w-full">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow px-4 py-4 w-2/5 border-t-2 border-gray-700 rounded">
                <div class="flex flex-col">
                    <span class="font-semibold">Cetak Bukti Pembayaran</span>
                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col space-y-1">
                            <label for="">Tanggal Transaksi</label>
                            <input type="text" class="rounded text-sm px-2 py-1 w-full">
                        </div>

                        <button
                            class="px-4 py-2 text-sm text-white bg-green-700 rounded flex items-center justify-center">Cetak
                            Bukti
                            Pembayaran</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="bg-white shadow px-4 py-4 w-full mt-6 border-t-2 border-gray-700 rounded">
            <div class="flex flex-col">
                <span class="font-semibold">Jenis Pembayaran</span>

                <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4"
                    id="tabs-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-bulanan"
                            class="nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active"
                            id="tabs-bulanan-tab" data-bs-toggle="pill" data-bs-target="#tabs-bulanan" role="tab"
                            aria-controls="tabs-bulanan" aria-selected="true">Bulanan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-bebas"
                            class="nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                            id="tabs-bebas-tab" data-bs-toggle="pill" data-bs-target="#tabs-bebas" role="tab"
                            aria-controls="tabs-bebas" aria-selected="false">Bebas</a>
                    </li>
                </ul>
                <div class="tab-content" id="tabs-tabContent">
                    <div class="tab-pane fade show active" id="tabs-bulanan" role="tabpanel"
                        aria-labelledby="tabs-bulanan-tab">
                        @if (isset($student->monthly->monthlyPayments))
                            <div class="flex flex-col">
                                <div class="flex justify-end">
                                    <a href="{{ route('exports.bulanan', Crypt::encrypt($student->id)) }}"
                                        target="_blank"
                                        class="bg-blue-500 text-white text-sm px-4 py-1 rounded flex items-center font-semibold"><i
                                            class='bx bxs-printer text-xl mr-2'></i> Cetak Bukti Pembayaran</a>
                                </div>
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="min-w-full">
                                                <thead class="bg-white border-b">
                                                    <tr class="border-b bg-yellow-100 border-yellow-200">
                                                        <th scope="col"
                                                            class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                            No.
                                                        </th>
                                                        <th scope="col"
                                                            class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                            Nama Pembayaran
                                                        </th>
                                                        <th scope="col"
                                                            class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                            Sisa Tagihan
                                                        </th>
                                                        @foreach ($student->monthly->monthlyPayments as $monthlyPayment)
                                                            <th scope="col"
                                                                class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                                {{ $monthlyPayment->month->name }}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr
                                                        class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                        <td
                                                            class="px-1 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            1
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-1 py-2 whitespace-nowrap">
                                                            Mark
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-1 py-2 text-center whitespace-nowrap">
                                                            Rp. {{ number_format($rest_of_the_bill, 0, ',', '.') }}
                                                        </td>
                                                        @foreach ($student->monthly->monthlyPayments as $monthlyPayment)
                                                            <td
                                                                class="text-sm text-gray-900 {{ $monthlyPayment->status ? 'bg-green-100' : 'bg-red-100' }} font-light px-1 py-2 text-center whitespace-nowrap">
                                                                <span class="cursor-pointer"
                                                                    wire:click="payMonthly('{{ $monthlyPayment->id }}')">{{ number_format($monthlyPayment->month_bill, 0, ',', '.') }}</span>
                                                            </td>
                                                        @endforeach

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span>Tidak Ada Pembayaran</span>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="tabs-bebas" role="tabpanel" aria-labelledby="tabs-bebas-tab">
                        @if (count($student->frees) != 0)
                            <div class="flex flex-col">
                                <div class="flex justify-end">
                                    <a href="{{ route('exports.bebas', Crypt::encrypt($student->id)) }}"
                                        target="_blank"
                                        class="bg-blue-500 text-white text-sm px-4 py-1 rounded flex items-center font-semibold"><i
                                            class='bx bxs-printer text-xl mr-2'></i> Cetak Bukti Pembayaran</a>
                                </div>
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="min-w-full">
                                                <thead class="bg-white border-b">
                                                    <tr class="border-b bg-yellow-100 border-yellow-200">
                                                        <th scope="col"
                                                            class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                            No.
                                                        </th>
                                                        <th scope="col"
                                                            class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                            Jenis Pembayaran
                                                        </th>
                                                        <th scope="col"
                                                            class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                            Total Tagihan
                                                        </th>
                                                        <th scope="col"
                                                            class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                            Dibayar
                                                        </th>
                                                        <th scope="col"
                                                            class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                            Status
                                                        </th>
                                                        <th scope="col"
                                                            class="text-sm font-medium text-gray-900 px-1 py-2 text-left">
                                                            Bayar
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($student->frees as $free)
                                                        <tr
                                                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                            <td
                                                                class="px-1 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td
                                                                class="text-sm text-gray-900 font-light px-1 py-2 whitespace-nowrap">
                                                                {{ $free->typeOfPayment->type_payment }}
                                                            </td>
                                                            <td
                                                                class="text-sm {{ $free->free_bill != 0 ? 'bg-red-100' : '' }} text-gray-900 font-light px-1 py-2 whitespace-nowrap">
                                                                Rp.
                                                                {{ number_format($free->free_bill, 0, ',', '.') }}
                                                            </td>
                                                            <td
                                                                class="text-sm {{ $free->free_bill != 0 ? 'bg-red-100' : '' }} text-gray-900 font-light px-1 py-2 whitespace-nowrap">
                                                                Rp.
                                                                {{ number_format($free->total_payment, 0, ',', '.') }}
                                                            </td>
                                                            <td
                                                                class="text-sm {{ $free->free_bill != 0 ? 'bg-red-100' : '' }} text-gray-900 font-light px-1 py-2 whitespace-nowrap">
                                                                @if ((int) $free->free_bill != 0)
                                                                    <span
                                                                        wire:click='freePayments("{{ $free->id }}")'
                                                                        class='text-white cursor-pointer bg-yellow-600 rounded px-1'>belum
                                                                        lunas</span>
                                                                @else
                                                                    <span
                                                                        wire:click='freePayments("{{ $free->id }}")'
                                                                        class='text-white cursor-pointer bg-green-500 rounded px-1'>lunas</span>
                                                                @endif
                                                            </td>
                                                            <td
                                                                class="text-sm {{ $free->free_bill != 0 ? 'bg-red-100' : '' }} text-gray-900 font-light px-1 py-2 flex whitespace-nowrap">
                                                                <button
                                                                    {{ (int) $free->free_bill <= 0 ? 'disabled' : '' }}
                                                                    wire:click="payFree('{{ $free->id }}')"
                                                                    class="text-sm text-white px-2 rounded flex items-center bg-green-700">
                                                                    <i class='bx bx-money text-xl mr-1'></i> Bayar
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span>Tidak Ada Pembayaran</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <x-jet-dialog-modal wire:model="modal_monthly">
        <x-slot name="title">
            Bayar
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6">
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Keterangan</label>
                    <input type="text" wire:model='description' id="" class="rounded py-2 px-2"
                        placeholder="Keterangan">
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click="storeMonthly" class="text-white bg-blue-500 px-4 py-2 rounded">Simpan</button>

            <x-jet-danger-button class="ml-2" wire:click="closeModal">
                Batal
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="modal_free">
        <x-slot name="title">
            Bayar
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6">
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Nama Pembayaran</label>
                    <input type="text" id="" value="dgdsg" readonly class="rounded py-2 px-2 bg-gray-200">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Tanggal</label>
                    <input type="text" id="" value="dgdsg" readonly class="rounded py-2 px-2 bg-gray-200">
                </div>
                @if (isset($free_bill))
                    <div class="flex flex-col space-y-1">
                        <label for="" class="font-semibold">Total Tagihan</label>
                        <input type="text" id="" value="{{ $free_bill }}" readonly
                            class="rounded py-2 px-2 bg-gray-200">
                    </div>
                @endif
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col col-span-1 space-y-1">
                        <label for="" class="font-semibold">Jumlah Bayar</label>
                        <input type="number" id="" wire:model="billing" class="rounded py-2 px-2 bg-gray-100">
                        @error('billing')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col col-span-1 space-y-1">
                        <label for="" class="font-semibold">Keterangan</label>
                        <input type="text" id="" wire:model="free_description" class="rounded py-2 px-2 bg-gray-100">
                        @error('free_description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click="storeFree" class="text-white bg-blue-500 px-4 py-2 rounded">Simpan</button>

            <x-jet-danger-button class="ml-2" wire:click="closeModal">
                Batal
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="modal_free_payments">
        <x-slot name="title">
            Bayar
        </x-slot>

        <x-slot name="content">
            @if (isset($free_payments))
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full border text-center">
                                    <thead class="border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-semibold text-gray-900 px-2 py-2 border-r">
                                                No
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-semibold text-gray-900 px-2 py-2 border-r">
                                                Tanggal
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-semibold text-gray-900 px-2 py-2 border-r">
                                                Jumlah Bayar
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-semibold text-gray-900 px-2 py-2 border-r">
                                                Keterangan
                                            </th>
                                            <th scope="col" class="text-sm font-semibold text-gray-900 px-2 py-2">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($free_payments as $free_payment)
                                            <tr class="border-b">
                                                <td
                                                    class="px-2 py-2 whitespace-nowrap text-sm font-medium text-gray-900 border-r">
                                                    {{ $loop->iteration }}</td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap border-r">
                                                    {{ $free_payment->created_at->format('d M Y') }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap border-r">
                                                    Rp. {{ number_format($free_payment->billing, 0, ',', '.') }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap border-r">
                                                    {{ $free_payment->description }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">
                                                    <button
                                                        wire:click="destroyFreePayment('{{ $free_payment->id }}')"
                                                        class="text-sm text-white bg-red-700 px-1 rounded"><i
                                                            class='bx bx-trash text-xl'></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="border-b">
                                            <td colspan="2"
                                                class="px-2 py-2 whitespace-nowrap text-sm font-semibold text-gray-900 border-r">
                                                Total Sudah Bayar</td>
                                            <td
                                                class="text-sm text-gray-900 font-semibold px-2 py-2 whitespace-nowrap border-r">
                                                Rp. {{ number_format($free_payments->sum('billing'), 0, ',', '.') }}
                                            </td>
                                            <td colspan="2"
                                                class="text-sm text-gray-900 font-semibold px-2 py-2 whitespace-nowrap">
                                                Tunggakan : Rp. {{ number_format($arrears, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            @endif
        </x-slot>

        <x-slot name="footer">
            <button wire:click="storeFree" class="text-white bg-blue-500 px-4 py-2 rounded">Simpan</button>

            <x-jet-danger-button class="ml-2" wire:click="closeModal">
                Batal
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    @endpush
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    @endpush
</div>
