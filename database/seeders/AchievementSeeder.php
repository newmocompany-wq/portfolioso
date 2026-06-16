<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $achievements = json_decode(file_get_contents(database_path('seeders/data/achievements.json')), true);

        foreach ($achievements as $index => $achievement) {
            Achievement::create([
                'title' => $achievement['title'],
                'description' => $achievement['description'],
                'full_description' => $achievement['fullDescription'],
                'cover' => $achievement['cover'],
                'date' => $achievement['date'] ?? null,
                'category' => $achievement['category'] ?? null,
                'live_link' => $achievement['liveLink'] ?? null,
                'gallery' => $achievement['gallery'] ?? [],
                'order' => $index + 1,
            ]);
        }
    }
}
