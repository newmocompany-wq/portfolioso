<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            AboutSeeder::class,
            AchievementSeeder::class,
            ResearchSeeder::class,
            CourseSeeder::class,
            ExperienceSeeder::class,
            PositionSeeder::class,
            BlogSeeder::class,
            EducationSeeder::class,
            ContactUsSeeder::class,
        ]);
    }
}
