<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        $about = json_decode(file_get_contents(database_path('seeders/data/about.json')), true);

        About::create([
            'bio' => $about['bio'],
            'vision' => $about['vision'],
            'skills' => $about['skills'] ?? [],
            'interests' => $about['interests'] ?? [],
        ]);
    }
}
