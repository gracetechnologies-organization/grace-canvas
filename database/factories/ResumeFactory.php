<?php

namespace Database\Factories;
use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resume>
 */
class ResumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'front_image' => '1-B-01.webp',
            'version' => 0,
            'cat_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
