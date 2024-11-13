<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Assuming you have users and courses already created
        $users = User::all();
        $courses = Course::all();

        foreach ($users as $user) {
            $user->courses()->attach($courses->unique()->random());
    }
}
}