<?php

namespace Database\Factories;

use App\Models\Classs;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number_lesson' => $this->faker->numberBetween('100', '200'),
            'subject_id' => Subject::query()->inRandomOrder()->value('id'),
            'classs_id' => Classs::query()->inRandomOrder()->value('id'),
            'teacher_id' => Teacher::query()->inRandomOrder()->value('id'),
        ];
    }
}
