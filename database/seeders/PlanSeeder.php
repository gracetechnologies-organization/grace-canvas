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
                'stripe_plan' => 'price_1Nu828AJ0BhvCZp9zkS8sMC6',
                'billing_method'=> 'month',
                'interval_count'=> 1,
                'currency' => 'usd',
                'price' => 5,
                'description' => 'Basic subscription'
            ],
            [
                'name' => 'Bronze',
                'slug' => 'Bronze',
                'stripe_plan' => 'price_1NrZ7kAJ0BhvCZp9ymmyMAUn',
                'billing_method'=> 'month',
                'interval_count'=> 3,
                'currency' => 'usd',
                'price' => 10,
                'description' => 'Bronze subscription'
            ],
            [
                'name' => 'Gold',
                'slug' => 'Gold',
                'stripe_plan' => 'price_1NrZ7kAJ0BhvCZp95weXZO6U',
                'billing_method'=> 'month',
                'interval_count'=> 6,
                'currency' => 'usd',
                'price' => 15,
                'description' => 'Gold subscription'
            ]
        ];

        foreach ($plans as $plan) Plan::create($plan);

        // Plan::factory()->count(1)->create();
    }
}
