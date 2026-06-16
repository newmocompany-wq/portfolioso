<?php

namespace App\Repository;

use App\Models\Research;

class ResearchRepository
{
    public function getResearches()
    {
        return Research::orderByDesc('year')->orderByDesc('id')->get();
    }

    public function getResearch($id)
    {
        return Research::find($id);
    }

    public function store($data)
    {
        return Research::create($data);
    }

    public function update($research, $data)
    {
        return $research->update($data);
    }

    public function delete($research)
    {
        return $research->delete();
    }
}
