<?php

namespace App\Services;

use App\Repository\AchievementRepository;
use App\Utils\ImageManager;
use Illuminate\Http\UploadedFile;

class AchievementService
{
    public function __construct(
        protected AchievementRepository $achievementRepository,
        protected ImageManager $imageManager
    ) {}

    public function getAchievements()
    {
        return $this->achievementRepository->getAchievements();
    }

    public function getAchievement($id)
    {
        return $this->achievementRepository->getAchievement($id) ?? false;
    }

    public function store($data)
    {
        if (isset($data['cover']) && $data['cover'] instanceof UploadedFile) {
            $data['cover'] = $this->imageManager->uploadSingleImage($data['cover'], 'achievements', 'public');
        }

        if (isset($data['gallery']) && is_array($data['gallery'])) {
            $data['gallery'] = $this->uploadGallery($data['gallery']);
        }

        return $this->achievementRepository->store($data);
    }

    public function update($data, $id)
    {
        $achievement = $this->achievementRepository->getAchievement($id);
        if (! $achievement) {
            return false;
        }

        if (isset($data['cover']) && $data['cover'] instanceof UploadedFile) {
            $data['cover'] = $this->imageManager->uploadSingleImage($data['cover'], 'achievements', 'public', $achievement->cover);
        }

        if (isset($data['gallery']) && is_array($data['gallery'])) {
            $data['gallery'] = $this->uploadGallery($data['gallery']);
        }

        return $this->achievementRepository->update($achievement, $data);
    }

    public function delete($id)
    {
        $achievement = $this->achievementRepository->getAchievement($id);
        if (! $achievement) {
            return false;
        }

        return $this->achievementRepository->delete($achievement);
    }

    private function uploadGallery(array $gallery): array
    {
        $images = [];
        foreach ($gallery as $image) {
            if ($image instanceof UploadedFile) {
                $path = $this->imageManager->uploadSingleImage($image, 'achievements', 'public');
                if ($path) {
                    $images[] = $path;
                }
            } elseif (is_string($image) && trim($image) !== '') {
                $images[] = $image;
            }
        }

        return $images;
    }
}
