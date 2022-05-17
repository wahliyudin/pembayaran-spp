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
            'name' => 'SMK NAHDLATUL ULAMA ATTARBIYYAH',
            'level' => 'SMK/SMA/MA',
            'address' => 'Jl. Desa Ciwulan Kec. Telagasari - Karawang 41381',
            'districts' => 'Telagasari',
            'city' => 'Karawang',
            'phone' => '085693296980',
            'logo' => 'assets/images/user-default.png'
        ]);
    }
}
