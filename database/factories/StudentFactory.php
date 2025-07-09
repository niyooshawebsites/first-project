<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>$this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'age'=> $this->faker->numberBetween(18, 30),
            'DOB'=> $this->faker->date('y-m-d'),
            'gender'=> $this->faker->randomElement(['m', 'f', 'o']),
        ];
    }
}
