<?php

namespace Database\Seeders;

use App\Models\Classs;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
        $faker = \Faker\Factory::create();
        $classses = Classs::query()->pluck('id')->toArray();
        $courses = Course::query()->pluck('id')->toArray();

        for($i = 1; $i <= 10000; $i++){
            $arr[] = [
                'name' => $faker->name(),
                'gender' => $faker->boolean(),
                'birthdate' => $faker->dateTimeBetween('-30 years', '-18 years'),
                'address' => $faker->city(),
                'phone' => $faker->phoneNumber(),
                'classs_id' => $classses[array_rand($classses)],
                'course_id' => $courses[array_rand($courses)],
            ];
            if($i % 1000 === 0){
                Student::insert($arr);
                $arr = [];
            }
        }
    }
}
