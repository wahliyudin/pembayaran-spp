<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolYear::create([
            'school_year' => '2021/2022',
            'status' => SchoolYear::STATUS_ACTIVE
        ]);
    }
}
