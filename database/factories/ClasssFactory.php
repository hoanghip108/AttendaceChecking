<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClasssFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'course_id' => Course::query()->inRandomOrder()->value('id'),
            'major_id' => Major::query()->inRandomOrder()->value('id'),
        ];
    }
}
