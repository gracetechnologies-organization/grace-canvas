<?php

namespace Database\Seeders;

use App\Models\Sticker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StickerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sticker::factory()->count(5)->create();
    }
}
