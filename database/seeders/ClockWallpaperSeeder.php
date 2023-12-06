<?php

namespace Database\Seeders;

use App\Models\ClockWallpaper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClockWallpaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClockWallpaper::factory()->count(5)->create();
    }
}
