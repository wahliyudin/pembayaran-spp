<?php

namespace Database\Seeders;

use App\Models\SchoolProfile;
use Illuminate\Database\Seeder;

class SchoolProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolProfile::create([
            'name' => '',
            'level' => '',
            'address' => '',
            'districts' => '',
            'city' => '',
            'phone' => '',
            'logo' => ''
        ]);
    }
}
