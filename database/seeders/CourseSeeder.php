<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = json_decode(file_get_contents(database_path('seeders/data/courses.json')), true);

        foreach ($courses as $course) {
            $model = Course::create([
                'title' => $course['title'],
                'description' => $course['description'] ?? null,
                'objectives' => $course['objectives'] ?? [],
                'cover' => $course['cover'] ?? null,
            ]);

            foreach ($course['lectures'] ?? [] as $lecture) {
                Lecture::create([
                    'course_id' => $model->id,
                    'title' => $lecture['title'],
                    'pdf' => $lecture['pdf'] ?? null,
                    'video_url' => $lecture['videoUrl'] ?? null,
                    'youtube_url' => $lecture['youtubeUrl'] ?? null,
                    'date' => $lecture['date'] ?? null,
                ]);
            }
        }
    }
}
