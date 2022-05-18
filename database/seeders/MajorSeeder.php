<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
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
                'name' => 'TKJ',
                'abbreviation' => 'TKJ'
            ],
            [
                'name' => 'TKJ ROMBEL A',
                'abbreviation' => 'TKJ ROMBEL A'
            ],
            [
                'name' => 'TKJ ROMBEL B',
                'abbreviation' => 'TKJ ROMBEL B'
            ],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}
