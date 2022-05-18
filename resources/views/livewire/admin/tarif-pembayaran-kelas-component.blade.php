<div class="px-4 py-8 w-full space-y-4">
    @include('layouts.inc.loading')
    <div class="flex gap-x-6 items-start w-full">
        <div class="flex flex-col gap-6 w-2/3">
            <div class="bg-white shadow w-full border-t-2 border-gray-700 rounded">
                <span class="border-b py-2 px-4 flex">Pilih Kelas</span>
                <div class="flex flex-col space-y-4 px-4 py-2">
                    <div class="flex justify-between items-center">
                        <label for="" class="text-sm font-semibold">Jenis Bayar</label>

                        <input type="text" class="text-sm w-2/3 bg-gray-100"
                            value="{{ $type_of_payment->type_payment }}" readonly>
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="" class="text-sm font-semibold">Tahun Ajaran</label>

                        <input type="text" class="text-sm w-2/3 bg-gray-100"
                            value="{{ $type_of_payment->schoolYear->year_start . ' / ' . $type_of_payment->schoolYear->year_end }}"
                            readonly>
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="" class="text-sm font-semibold">Tipe Bayar</label>

                        <input type="text" class="text-sm w-2/3 bg-gray-100" value="{{ $type_of_payment->type }}"
                            readonly>
                    </div>

                    <div class="flex justify-between items-center">
                        <label for="" class="text-sm font-semibold">Kelas</label>

                        <div class="flex flex-col space-y-1 w-2/3">
                            <select class="text-sm w-full" wire:model="data_class_id">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach ($data_classes as $data_class)
                                    <option value="{{ $data_class->id }}">{{ $data_class->name }}</option>
                                @endforeach
                            </select>
                            @error('data_class_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow w-full border-t-2 border-gray-700 rounded">
                <span class="border-b py-2 px-4 flex">Tarif Setiap Bulan Sama</span>
                <div class="flex justify-between items-center py-4 px-4">
                    <label for="" class="text-sm font-semibold">Tarif Bulanan (Rp.)</label>

                    <div class="flex flex-col space-y-1 w-2/3">
                        <input type="number" class="text-sm w-full" wire:model='bill_all' />
                        @error('bill_all')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center space-x-2 px-4 py-2 border-t">
                    <button wire:click="createSame"
                        class="px-4 py-2 text-white bg-green-700 rounded text-sm flex items-center"><i
                            class='bx bx-save mr-1 text-xl'></i> Simpan</button>
                    <button class="px-4 py-2 border bg-gary-50 rounded text-sm flex items-center">Cancel</button>
                </div>
            </div>
        </div>
        <div class="bg-white shadow w-full border-t-2 border-gray-700 rounded flex-grow">
            <span class="border-b py-2 px-4 flex">Tarif Setiap Bulan Tidak Sama</span>
            <div class="flex flex-col divide-y px-2">
                @foreach ($months as $month)
                    <div class="flex justify-between items-center py-2 px-2">
                        <label for="" class="text-sm font-semibold capitalize">{{ $month->name }}</label>

                        <input wire:model='monthly.{{ $month->id }}' type="number" class="text-sm w-2/3" />
                    </div>
                @endforeach
            </div>

            <div class="flex items-center space-x-2 px-4 py-2 border-t">
                <button wire:click="create"
                    class="px-4 py-2 text-white bg-green-700 rounded text-sm flex items-center"><i
                        class='bx bx-save mr-1 text-xl'></i> Simpan</button>
                <button class="px-4 py-2 border bg-gary-50 rounded text-sm flex items-center">Cancel</button>
            </div>
        </div>
    </div>
</div>
