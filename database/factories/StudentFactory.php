<?php

namespace Database\Factories;

use App\Models\DataClass;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->numberBetween(100000000, 999999999),
            'name' => $this->faker->name(),
            'data_class_id' => $this->faker->randomElement(DataClass::pluck('id')->toArray()),
            'major_id' => $this->faker->randomElement(Major::pluck('id')->toArray()),
            'status' => $this->faker->boolean()
        ];
    }
}
