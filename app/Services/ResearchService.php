<?php

namespace App\Services;

use App\Repository\ResearchRepository;
use App\Utils\ImageManager;
use Illuminate\Http\UploadedFile;

class ResearchService
{
    public function __construct(
        protected ResearchRepository $researchRepository,
        protected ImageManager $imageManager
    ) {}

    public function getResearches()
    {
        return $this->researchRepository->getResearches();
    }

    public function getResearch($id)
    {
        return $this->researchRepository->getResearch($id) ?? false;
    }

    public function store($data)
    {
        if (isset($data['cover']) && $data['cover'] instanceof UploadedFile) {
            $data['cover'] = $this->imageManager->uploadSingleImage($data['cover'], 'researches', 'public');
        }

        if (isset($data['pdf']) && $data['pdf'] instanceof UploadedFile) {
            $data['pdf'] = $this->imageManager->uploadSingleImage($data['pdf'], 'researches/pdf', 'public');
        }

        return $this->researchRepository->store($data);
    }

    public function update($data, $id)
    {
        $research = $this->researchRepository->getResearch($id);
        if (! $research) {
            return false;
        }

        if (isset($data['cover']) && $data['cover'] instanceof UploadedFile) {
            $data['cover'] = $this->imageManager->uploadSingleImage($data['cover'], 'researches', 'public', $research->cover);
        }

        if (isset($data['pdf']) && $data['pdf'] instanceof UploadedFile) {
            $data['pdf'] = $this->imageManager->uploadSingleImage($data['pdf'], 'researches/pdf', 'public', $research->pdf);
        }

        return $this->researchRepository->update($research, $data);
    }

    public function delete($id)
    {
        $research = $this->researchRepository->getResearch($id);
        if (! $research) {
            return false;
        }

        return $this->researchRepository->delete($research);
    }
}
