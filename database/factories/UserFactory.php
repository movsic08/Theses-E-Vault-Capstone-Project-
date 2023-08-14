<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    //faker
    protected $model = User::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'username' => $this->faker->userName,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            // You can replace 'password' with your desired password
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'student_id' => $this->faker->unique()->randomNumber(),
            'staff_id' => $this->faker->unique()->randomNumber(),
            'profile_picture' => null,
            // Set to null or use your logic for generating profile pictures
            'bio' => $this->faker->sentence,
            'bachelor_degree' => $this->faker->numberBetween(1, 2),
            // Replace 1 and 2 with actual degree IDs
            'role_id' => $this->faker->numberBetween(1, 2),
            // Replace 1, 3 with actual role IDs
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTimeThisDecade(),
            'updated_at' => $this->faker->date(),
        ];
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition(): array
    // {
    //     return [
    //         'name' => fake()->name(),
    //         'email' => fake()->unique()->safeEmail(),
    //         'email_verified_at' => now(),
    //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    //         // password
    //         'remember_token' => Str::random(10),
    //     ];
    // }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}