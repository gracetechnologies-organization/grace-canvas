<?php

namespace Database\Seeders;

use App\Models\BirthdayCake;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BirthdayCakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BirthdayCake::factory()->count(5)->create();
    }
}
