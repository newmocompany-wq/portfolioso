<?php

namespace App\Repository;

use App\Models\Position;

class PositionRepository
{
    public function getPositions()
    {
        return Position::orderBy('order')->orderByDesc('id')->get();
    }

    public function getPosition($id)
    {
        return Position::find($id);
    }

    public function store($data)
    {
        return Position::create($data);
    }

    public function update($position, $data)
    {
        return $position->update($data);
    }

    public function delete($position)
    {
        return $position->delete();
    }
}
