<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = json_decode(file_get_contents(database_path('seeders/data/experiences.json')), true);

        foreach ($experiences as $index => $experience) {
            Experience::create([
                'position' => $experience['position'],
                'organization' => $experience['organization'],
                'from' => $experience['from'] ?? null,
                'to' => $experience['to'] ?? null,
                'description' => $experience['description'] ?? null,
                'responsibilities' => $experience['responsibilities'] ?? [],
                'order' => $index + 1,
            ]);
        }
    }
}
