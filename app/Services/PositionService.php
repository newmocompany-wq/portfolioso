<?php

namespace App\Services;

use App\Repository\PositionRepository;

class PositionService
{
    public function __construct(protected PositionRepository $positionRepository) {}

    public function getPositions()
    {
        return $this->positionRepository->getPositions();
    }

    public function getPosition($id)
    {
        return $this->positionRepository->getPosition($id) ?? false;
    }

    public function store($data)
    {
        return $this->positionRepository->store($data);
    }

    public function update($data, $id)
    {
        $position = $this->positionRepository->getPosition($id);
        if (! $position) {
            return false;
        }

        return $this->positionRepository->update($position, $data);
    }

    public function delete($id)
    {
        $position = $this->positionRepository->getPosition($id);
        if (! $position) {
            return false;
        }

        return $this->positionRepository->delete($position);
    }
}
