<?php

namespace Database\Seeders;

use App\Models\Research;
use Illuminate\Database\Seeder;

class ResearchSeeder extends Seeder
{
    public function run(): void
    {
        $researches = json_decode(file_get_contents(database_path('seeders/data/researches.json')), true);

        foreach ($researches as $research) {
            Research::create([
                'title' => $research['title'],
                'year' => $research['year'] ?? null,
                'abstract' => $research['abstract'] ?? null,
                'authors' => $research['authors'] ?? [],
                'keywords' => $research['keywords'] ?? [],
                'journal' => $research['journal'] ?? null,
                'conference' => $research['conference'] ?? null,
                'doi' => $research['doi'] ?? null,
                'link' => $research['link'] ?? null,
                'pdf' => $research['pdf'] ?? null,
                'cover' => $research['cover'] ?? null,
            ]);
        }
    }
}
