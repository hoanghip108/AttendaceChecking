<?php

namespace Database\Seeders;

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
        \App\Models\Major::factory(10)->create();
        \App\Models\Teacher::factory(50)->create();
        \App\Models\Subject::factory(100)->create();
        \App\Models\Course::factory(10)->create();
        \App\Models\Classs::factory(50)->create();
        \App\Models\Student::factory(1000)->create();
        \App\Models\Lesson::factory(10)->create();
        \App\Models\Slot::factory(100)->create();
        \App\Models\Attendance::factory(50)->create();
    }
}
