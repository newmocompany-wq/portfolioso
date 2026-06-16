<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = json_decode(file_get_contents(database_path('seeders/data/settings.json')), true);

        Setting::create([
            'doctor_name' => $settings['doctorName'],
            'icon' => $settings['icon'],
            'favicon' => $settings['favicon'],
        ]);
    }
}
