<?php

namespace App\Imports\Student;

use App\Models\Student;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SecondSheetImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (!Student::where('nim', Arr::get($row, 'nis'))->first()) {
                Student::create([
                    'nim' => Arr::get($row, 'nis'),
                    'name' => Arr::get($row, 'nama'),
                    'data_class_id' => 2,
                    'major_id' => Arr::get($row, 'jurusan'),
                    'status' => Arr::get($row, 'status')
                ]);
            }
        }
    }
}
