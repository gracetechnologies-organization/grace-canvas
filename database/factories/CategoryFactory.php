<?php

namespace Database\Factories;

use App\Models\ParentCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->unique()->word(),
            'image' => $this->faker->unique()->word() . '.jpg',
            'parent_cat_id' => ParentCategory::inRandomOrder()->first()->id
        ];
    }
}
