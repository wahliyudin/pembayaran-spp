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
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Nama Pembayaran
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Jenis Pembayaran
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Tipe
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Tahun
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Tarif Pembayaran
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($type_of_payments as $item)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $item->payment->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{-- INFAQ - TP 2021/2022 --}}
                                            {{ $item->type_payment }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->type }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->schoolYear->year_start . ' / ' . $item->schoolYear->year_end }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route($item->type == 'bulanan' ? 'tarif-pembayaran' : 'tarif-tagihan', Crypt::encrypt($item->id)) }}"
                                                class="text-sm text-white bg-blue-600 px-2 py-1 rounded">Atur Tarif
                                                Pembayaran</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-1">
                                                <button class="bg-red-600 text-white px-2 py-2 rounded flex"
                                                    wire:click="delete('{{ $item->id }}')">
                                                    <i class='bx bx-trash text-xl'></i>
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
                {{ $type_of_payments->links('vendor.livewire.tailwind') }}
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Tambah Jenis Pembayaran
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Pembayaran</label>
                    <select wire:model='payment_id' id="" class="rounded py-2 px-2">
                        <option selected>-- pilih --</option>
                        @foreach ($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                        @endforeach
                    </select>
                    @error('payment_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Tahun</label>
                    <select wire:model='school_year_id' id="" class="rounded py-2 px-2">
                        <option selected>-- pilih --</option>
                        @foreach ($school_years as $school_year)
                            <option value="{{ $school_year->id }}">
                                {{ $school_year->year_start . ' / ' . $school_year->year_end }}</option>
                        @endforeach
                    </select>
                    @error('school_year_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Jenis Pembayaran</label>
                    <input type="text" wire:model='type_payment' id="" class="rounded py-2 px-2"
                        placeholder="Keterangan">
                    @error('type_payment')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="" class="font-semibold">Tipe</label>
                    <select wire:model='type' id="" class="rounded py-2 px-2">
                        <option selected>-- pilih --</option>
                        <option value="bulanan">Bulanan</option>
                        <option value="bebas">Bebas</option>
                    </select>
                    @error('type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            @if (isset($typeOfPayment))
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
