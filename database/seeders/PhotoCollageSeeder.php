<?php

namespace Database\Seeders;

use App\Models\PhotoCollage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoCollageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhotoCollage::factory()->count(5)->create();
    }
}
