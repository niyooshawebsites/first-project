<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Student::factory(100)->create();
        // Teacher::factory(50)->create();
        //User::factory(150)->create();

        // create 100 students
        // User::factory()->count(100)->state(['user_type' => 'student'])->create();
        // User::factory()->count(50)->state(['user_type' => 'teacher'])->create();

        // create 50 teachers
        // Teacher::factory(50)->create();
        Classes::factory(100)->create();
    }
}
