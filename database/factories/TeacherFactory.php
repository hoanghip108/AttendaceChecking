<?php

namespace Database\Factories;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'gender' => $this->faker->boolean(),
            'birthdate' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            'address' => $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'major_id' => Major::query()->inRandomOrder()->value('id'),
        ];
    }
}
