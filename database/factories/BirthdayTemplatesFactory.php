<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BirthdayTemplates>
 */
class BirthdayTemplatesFactory extends Factory
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
            'thumbnail' => $this->faker->unique()->word() . '.jpg',
            'type' => $this->faker->randomElement([1, 2, 3]),
            'version' => $this->faker->randomElement([0, 1])
        ];
    }
}
