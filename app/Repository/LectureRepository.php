<?php

namespace App\Repository;

use App\Models\Lecture;

class LectureRepository
{
    public function getLectures()
    {
        return Lecture::with('course')->orderByDesc('id')->get();
    }

    public function getLecture($id)
    {
        return Lecture::with('course')->find($id);
    }

    public function store($data)
    {
        return Lecture::create($data);
    }

    public function update($lecture, $data)
    {
        return $lecture->update($data);
    }

    public function delete($lecture)
    {
        return $lecture->delete();
    }
}
