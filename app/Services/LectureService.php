<?php

namespace App\Services;

use App\Repository\LectureRepository;
use App\Utils\ImageManager;
use Illuminate\Http\UploadedFile;

class LectureService
{
    public function __construct(
        protected LectureRepository $lectureRepository,
        protected ImageManager $imageManager
    ) {}

    public function getLectures()
    {
        return $this->lectureRepository->getLectures();
    }

    public function getLecture($id)
    {
        return $this->lectureRepository->getLecture($id) ?? false;
    }

    public function store($data)
    {
        

        return $this->lectureRepository->store($data);
    }

    public function update($data, $id)
    {
        $lecture = $this->lectureRepository->getLecture($id);
        if (! $lecture) {
            return false;
        }

        if (isset($data['pdf']) && $data['pdf'] instanceof UploadedFile) {
            $data['pdf'] = $this->imageManager->uploadSingleImage($data['pdf'], 'lectures', 'public', $lecture->pdf);
        }

        return $this->lectureRepository->update($lecture, $data);
    }

    public function delete($id)
    {
        $lecture = $this->lectureRepository->getLecture($id);
        if (! $lecture) {
            return false;
        }

        return $this->lectureRepository->delete($lecture);
    }
}
