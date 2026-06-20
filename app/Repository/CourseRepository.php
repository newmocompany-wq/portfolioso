<?php

namespace App\Repository;

use App\Models\Course;

class CourseRepository
{
    public function getCourses()
    {
        return Course::withCount('lectures')->orderByDesc('id')->get();
    }

    public function getCourse($id)
    {
        return Course::query()
            ->withCount('lectures')
            ->with('lectures')
            ->findOrFail($id);
    }

    public function store($data)
    {
        return Course::create($data);
    }

    public function update($course, $data)
    {
        return $course->update($data);
    }

    public function delete($course)
    {
        return $course->delete();
    }
}
