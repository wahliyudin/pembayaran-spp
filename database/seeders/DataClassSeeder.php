<?php

namespace Database\Seeders;

use App\Models\DataClass;
use Illuminate\Database\Seeder;

class DataClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            [
                'name' => 'X',
            ],
            [
                'name' => 'XI'
            ],
            [
                'name' => 'XII'
            ],
        ];

        foreach ($majors as $major) {
            DataClass::create($major);
        }
    }
}
