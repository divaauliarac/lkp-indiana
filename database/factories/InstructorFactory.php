<?php

namespace Database\Factories;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class InstructorFactory extends Factory
{
    protected $model = Instructor::class;
    public function definition(): array
    {
        return [
            'name'       => $this->faker->name(),
            'gender'     => $this->faker->randomElement(['male', 'female']),
            'expertise'  => $this->faker->randomElement(['ap', 'dg', 'pg', 'jk']),
            'phone'      => $this->faker->phoneNumber(),
            'address'    => $this->faker->address(),
            'photo'      => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
