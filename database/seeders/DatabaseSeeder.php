<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users, 10 courses, and 10 profiles
        User::factory(10)->create();
        Course::factory(10)->create();
        Profile::factory(10)->create();

        // Retrieve all 10 users
        $users = User::take(10)->get();

        // Retrieve all 10 courses
        $courses = Course::take(10)->get();

        // Ensure there are both users and courses
        if ($courses->isNotEmpty() && $users->isNotEmpty()) {
            // Loop through each course and attach all users to it
            foreach ($courses as $course) {
                // Attach all users to the current course
                $course->users()->attach($users->pluck('id')->toArray());
                Log::info("Users attached to Course (ID: {$course->id})");
            }

            // Loop through each user and attach all courses to them
            foreach ($users as $user) {
                // Attach all courses to the current user
                $user->courses()->attach($courses->pluck('id')->toArray());
                Log::info("Courses attached to User (ID: {$user->id})");
            }
        } else {
            // Log an error if no users or courses exist
            Log::error("Failed to retrieve users or courses for seeding.");
        }
    }
}
