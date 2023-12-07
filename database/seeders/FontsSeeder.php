<?php

namespace Database\Seeders;

use App\Models\Fonts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FontsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fonts::factory()->count(5)->create();
    }
}
