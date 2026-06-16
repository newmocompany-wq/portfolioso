<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    public function run(): void
    {
        $messages = json_decode(file_get_contents(database_path('seeders/data/messages.json')), true);

        foreach ($messages as $message) {
            ContactUs::create([
                'name' => $message['name'],
                'email' => $message['email'],
                'subject' => $message['subject'] ?? null,
                'message' => $message['body'] ?? null,
                'read' => $message['read'] ?? false,
            ]);
        }
    }
}
