<?php

namespace App\Repository;

use App\Models\Achievement;

class AchievementRepository
{
    public function getAchievements()
    {
        return Achievement::orderBy('order')->orderByDesc('id')->get();
    }

    public function getAchievement($id)
    {
        return Achievement::find($id);
    }

    public function store($data)
    {
        return Achievement::create($data);
    }

    public function update($achievement, $data)
    {
        return $achievement->update($data);
    }

    public function delete($achievement)
    {
        return $achievement->delete();
    }
}
