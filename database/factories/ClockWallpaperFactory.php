<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClockWallpaper>
 */
class ClockWallpaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->unique()->word() . '.webp',
            'thumbnail' => $this->faker->unique()->word() . '.webp',
            'cat_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
