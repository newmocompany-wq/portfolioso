<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = json_decode(file_get_contents(database_path('seeders/data/positions.json')), true);

        foreach ($positions as $index => $position) {
            Position::create([
                'title' => $position['title'],
                'organization' => $position['organization'] ?? null,
                'description' => $position['description'] ?? null,
                'icon' => $position['icon'] ?? null,
                'order' => $index + 1,
            ]);
        }
    }
}
