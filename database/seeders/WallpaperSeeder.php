<?php

namespace Database\Seeders;

use App\Models\Wallpaper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WallpaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wallpaper::factory()->count(5)->create();
    }
}
