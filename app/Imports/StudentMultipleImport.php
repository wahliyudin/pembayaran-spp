<?php

namespace App\Imports;

use App\Imports\Student\FirstSheetImport;
use App\Imports\Student\SecondSheetImport;
use App\Imports\Student\ThirdSheetImport;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StudentMultipleImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'X' => new FirstSheetImport(),
            'XI' => new SecondSheetImport(),
            'XII' => new ThirdSheetImport()
        ];
    }
}
