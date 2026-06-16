<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $professor = json_decode(file_get_contents(database_path('seeders/data/professor.json')), true);

        User::create([
            'name' => $professor['name'],
            'title' => $professor['title'],
            'avatar' => $professor['avatar'],
            'department' => $professor['department'],
            'university' => $professor['university'],
            'email' => 'admin@portfolioso.test',
            'phone' => $professor['phone'],
            'office' => $professor['office'],
            'office_hours' => $professor['officeHours'],
            'address' => $professor['address'],
            'cv' => $professor['cv'],
            'password' => '12345678',
            'social_links' => $professor['socials'],
            'contact_email' => $professor['email'],
        ]);
    }
}
