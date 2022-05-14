<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Carbon\Carbon;
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
            'year_start' => now()->format('Y'),
            'year_end' => now()->addYear()->format('Y'),
            'status' => SchoolYear::STATUS_ACTIVE
        ]);
    }
}
