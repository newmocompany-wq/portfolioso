<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageManager
{
    /**
     * Create a new class instance.
     */
    public function uploadSingleImage($file, $path, $disk, $oldPath = null)
    {
        if ($file) {
            if ($oldPath) {
                $this->deleteImageFromLocal($oldPath);
            }
            $newImageName = $this->generateName($file, $path, $disk);

            return $newImageName;
        }

        return false;
    }

    private function generateName($image, $path, $disk)
    {
        $file = Str::uuid().time().'.'.$image->getClientOriginalExtension();

        return $image->storeAs("uploads/$path", $file, ['disk' => $disk]);

    }

    public function deleteImageFromLocal($imagePath, $disk = 'public')
    {
        if (is_array($imagePath)) {

            foreach ($imagePath as $path) {
                Storage::disk($disk)->delete($path);
            }

            return;
        }

        if ($imagePath) {
            Storage::disk($disk)->delete($imagePath);
        }
    }

    public function uploadCv($file, $path, $disk = 'public', $oldPath = null)
    {
        if ($file) {

            if ($oldPath) {
                $this->deleteImageFromLocal($oldPath, $disk);
            }

            $fileName = 'cv.'.$file->getClientOriginalExtension();

            return $file->storeAs(
                "uploads/$path",
                $fileName,
                ['disk' => $disk]
            );
        }

        return false;
    }
}
