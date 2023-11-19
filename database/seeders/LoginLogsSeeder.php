<?php

namespace Database\Seeders;

// database/seeders/LoginLogsSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LoginLogsSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data from the table
        DB::table('login_logs')->truncate();

        // Generate sample login logs for September to November 2023
        $startDate = Carbon::parse('2023-09-01');
        $endDate = Carbon::parse('2023-11-30');

        while ($startDate <= $endDate) {
            // For each day, simulate logins for some users
            for ($i = 1; $i <= 10; $i++) {
                // Assuming user IDs start from 1
                $userId = rand(200, 300);

                // Simulate random login times throughout the day
                $loginTime = $startDate->copy()->addMinutes(rand(0, 1439)); // 0 to 1439 minutes in a day

                // Insert data into the login_logs table
                DB::table('login_logs')->insert([
                    'user_id' => $userId,
                    'login_time' => $loginTime,
                    'is_admin' => rand(0, 1),
                ]);
            }

            // Move to the next day
            $startDate->addDay();
        }
    }
}

