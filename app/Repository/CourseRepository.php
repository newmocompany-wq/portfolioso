<?php

namespace App\Repository;

use App\Models\Course;

class CourseRepository
{
    public function getCourses()
    {
        return Course::with('lectures')->orderByDesc('id')->get();
    }

    public function getCourse($id)
    {
        return Course::with('lectures')->find($id);
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
