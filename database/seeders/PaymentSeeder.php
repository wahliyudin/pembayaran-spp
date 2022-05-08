<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = [
            ['name' => 'INFAQ', 'description' => 'Sumbangan Infaq Bulanan']
        ];

        for ($i = 0; $i < count($payments); $i++) {
            Payment::create($payments[$i]);
        }
    }
}
