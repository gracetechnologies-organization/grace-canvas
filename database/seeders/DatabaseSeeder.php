<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            CategorySeeder::class,
            BusinessCardSeeder::class,
            LetterHeadSeeder::class,
            WallpaperSeeder::class,
            ResumeSeeder::class,
            BirthdayTemplatesSeeder::class,
            ParentCategorySeeder::class,
            PlanSeeder::class,
            AudioSeeder::class,
            BirthdayCakeSeeder::class,
            StickerSeeder::class,
            FontsSeeder::class,
            ClockWallpaperSeeder::class,
            PhotoCollageSeeder::class
        ]);
    }
}
