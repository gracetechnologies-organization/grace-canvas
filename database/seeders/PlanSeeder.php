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
                'name' => 'Premium',
                'slug' => 'Premium',
                'stripe_plan' => 'price_1NrZ7kAJ0BhvCZp9ymmyMAUn',
                'billing_method'=> 'month',
                'interval_count'=> 1,
                'currency' => 'usd',
                'price' => 10,
                'description' => 'Premium  subscription'
            ],
            [
                'name' => 'Premium',
                'slug' => 'Premium',
                'stripe_plan' => 'price_1NrZ7kAJ0BhvCZp95weXZO6U',
                'billing_method'=> 'month',
                'interval_count'=> 1,
                'currency' => 'usd',
                'price' => 15,
                'description' => 'Premium subscription'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
