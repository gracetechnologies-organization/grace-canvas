<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessCard>
 */
class BusinessCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'front_image' => $this->faker->unique()->word() . '.jpg',
            'back_image' => $this->faker->unique()->word() . '.jpg',
            'front_svg' => '1/1_',
            'back_svg' => '1/1_'
        ];
    }
}
