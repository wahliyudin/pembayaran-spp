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
            'name' => 'Consequuntur veritat',
            'level' => 'SMK/SMA/MA',
            'address' => 'Esse voluptatem cil',
            'districts' => 'Et atque in perferen',
            'city' => 'Aliquid sed ex dolor',
            'phone' => '054454545',
            'logo' => 'assets/images/user-default.png'
        ]);
    }
}
