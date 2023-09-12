<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Basic',
                'slug' => 'Basic',
                'stripe_plan' => 'price_1NpOGPAJ0BhvCZp9D8CxhhzO',
                'price' => 0,
                'description' => 'Basic subscription'
            ],
            [
                'name' => 'Bronze',
                'slug' => 'Bronze',
                'stripe_plan' => 'price_1NpOBjAJ0BhvCZp9DVlfwYSs',
                'price' => 10,
                'description' => 'Bronze subscription'
            ],
            [
                'name' => 'Gold',
                'slug' => 'Gold',
                'stripe_plan' => 'price_1NpODKAJ0BhvCZp9dlKrVuC8',
                'price' => 50,
                'description' => 'Gold subscription'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
