<?php

namespace Database\Seeders;

use App\Models\DataClass;
use App\Models\Major;
use App\Models\SchoolYear;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(SchoolYearSeeder::class);
        $this->call(SchoolProfileSeeder::class);
        $this->call(MonthSeeder::class);
        // DataClass::factory(5)->create();
        // Major::factory(10)->create();
        // Student::factory(100)->create();
        // $this->call(PaymentSeeder::class);
    }
}
