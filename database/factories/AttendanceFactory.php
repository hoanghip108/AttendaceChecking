<?php

namespace Database\Factories;

use App\Enums\AttendanceStatusEnum;
use App\Models\Slot;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => AttendanceStatusEnum::getRandomValue(),
            'slot_id' => Slot::query()->inRandomOrder()->value('id'),
            'student_id' => Student::query()->inRandomOrder()->value('id'),
        ];
    }
}
