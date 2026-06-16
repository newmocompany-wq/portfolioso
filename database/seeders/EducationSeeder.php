<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $education = json_decode(file_get_contents(database_path('seeders/data/education.json')), true);

        foreach ($education as $index => $item) {
            Education::create([
                'degree' => $item['degree'],
                'school' => $item['school'] ?? null,
                'year' => $item['year'] ?? null,
                'focus' => $item['focus'] ?? null,
                'order' => $index + 1,
            ]);
        }
    }
}
