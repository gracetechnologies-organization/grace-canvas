<?php

namespace Database\Seeders;

use App\Models\BirthdayTemplates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BirthdayTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BirthdayTemplates::factory()->count(5)->create();

    }
}
