<?php

namespace Database\Seeders;

use App\Models\BirthdayTempletes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BirthdayTempletesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BirthdayTempletes::factory()->count(5)->create();

    }
}
