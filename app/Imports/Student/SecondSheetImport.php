<?php

namespace App\Imports\Student;

use App\Models\Student;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SecondSheetImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Student::create([
                'nim' => Arr::get($row, 1),
                'name' => Arr::get($row, 2),
                'data_class_id' => Arr::get($row, 3),
                'major_id' => Arr::get($row, 4),
                'status' => Arr::get($row, 5)
            ]);
        }
    }
}
