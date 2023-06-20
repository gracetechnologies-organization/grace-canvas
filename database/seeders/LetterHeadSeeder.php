<?php

namespace Database\Seeders;

use App\Models\LetterHead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LetterHead::factory()->count(5)->create();
    }
}
