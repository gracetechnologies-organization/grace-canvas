<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BirthdayCake>
 */
class BirthdayCakeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->unique()->word() . '.jpg',
            'thumbnail' => $this->faker->unique()->word() . '.jpg'
        ];
    }
}
