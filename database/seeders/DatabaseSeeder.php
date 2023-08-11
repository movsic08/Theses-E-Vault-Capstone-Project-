<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// use App\Models\Account_role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        \App\Models\Account_role::create([
            'role' => 'student'
        ]);

        \App\Models\Account_role::create([
            'role' => 'faculty_member'
        ]);

        \App\Models\Account_role::create([
            'role' => 'admin'
        ]);
    }

}