<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'nim' => Arr::get($row, 1),
            'name' => Arr::get($row, 2),
            'data_class_id' => Arr::get($row, 3),
            'major_id' => Arr::get($row, 4),
            'status' => Arr::get($row, 5)
        ]);
    }
}
