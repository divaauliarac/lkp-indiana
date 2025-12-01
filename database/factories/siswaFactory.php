<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\siswa>
 */
class siswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['m', 'f']),
            'place' => fake()->city(),
            'dateofbirth' => fake()->dateTimeBetween('-10 years', '-20 month'),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'subject' => fake()->randomElement(['ap', 'dg', 'pg', 'jk']),
            'education' => fake()->randomElement(['junior', 'senior', 'bachelor']),
            'photo' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
