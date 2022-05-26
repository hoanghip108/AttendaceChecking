<?php

namespace Database\Factories;

use App\Enums\SlotSlotEnum;
use App\Models\Classs;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slot' => SlotSlotEnum::getRandomValue(),
            'date' => $this->faker->unique()->date(),
            'teacher_id' => Teacher::query()->inRandomOrder()->value('id'),
            'classs_id' => Classs::query()->inRandomOrder()->value('id'),
            'subject_id' => Subject::query()->inRandomOrder()->value('id'),
        ];
    }
}
