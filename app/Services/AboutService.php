<?php

namespace App\Services;

use App\Repository\AboutRepository;

class AboutService
{
    public function __construct(protected AboutRepository $aboutRepository) {}

    public function getFirstAbout()
    {
        return $this->aboutRepository->getFirstAbout() ?? false;
    }

    public function store($data)
    {
        return $this->aboutRepository->store($data);
    }

    public function update($data)
    {
        $about = $this->aboutRepository->getFirstAbout();
        if (! $about) {
            return $this->aboutRepository->store($data);
        }

        return $this->aboutRepository->update($about, $data);
    }
}
