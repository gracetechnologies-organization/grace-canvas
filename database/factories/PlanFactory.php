<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // [
            //     'name' => 'Basic',
            //     'slug' => 'Basic',
            //     'stripe_plan' => 'price_1Nu828AJ0BhvCZp9zkS8sMC6',
            //     'billing_method'=> 'month',
            //     'interval_count'=> 1,
            //     'currency' => 'usd',
            //     'price' => 5,
            //     'description' => 'Basic subscription'
            // ],
            // [
            //     'name' => 'Bronze',
            //     'slug' => 'Bronze',
            //     'stripe_plan' => 'price_1NrZ7kAJ0BhvCZp9ymmyMAUn',
            //     'billing_method'=> 'month',
            //     'interval_count'=> 1,
            //     'currency' => 'usd',
            //     'price' => 10,
            //     'description' => 'Bronze subscription'
            // ],
            // [
            //     'name' => 'Gold',
            //     'slug' => 'Gold',
            //     'stripe_plan' => 'price_1NrZ7kAJ0BhvCZp95weXZO6U',
            //     'billing_method'=> 'month',
            //     'interval_count'=> 1,
            //     'currency' => 'usd',
            //     'price' => 15,
            //     'description' => 'Gold subscription'
            // ]
        ];
    }
}
