<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if the 'Test User' already exists by email
        $user = User::where('email', 'test@example.com')->first();

        // If the 'Test User' doesn't exist, create it
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',  // Fixed email for Test User
            ]);
            
            Profile::create([
                'user_id' => $user->id,  // Associate the profile with the user
                'bio' => 'This is the bio of ' . $user->name,
                'school' => 'Test School',
            ]);
        }

        // Now create 10 more users and their associated profiles
        User::factory(10)->create()->each(function ($user) {
            Profile::create([
                'user_id' => $user->id,  // Associate the profile with the new user
                'bio' => 'This is the bio of ' . $user->name,
                'school' => 'Random School ' . rand(1, 100),
            ]);
        });
        // Optionally, create some courses and associate them with users (if needed)
        $course1 = Course::create(['course_name' => 'Laravel Basics']);
        $course2 = Course::create(['course_name' => 'Advanced PHP']);

        // Associate users with courses
        $users = User::take(5)->get();
        $course1->users()->attach($users->pluck('id'));
        $course2->users()->attach($users->pluck('id'));
    }
}
