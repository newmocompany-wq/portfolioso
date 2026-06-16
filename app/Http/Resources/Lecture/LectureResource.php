<?php

namespace App\Http\Resources\Lecture;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'title' => $this->title,
            'pdf' => mediaUrl($this->pdf),
            'video_url' => $this->video_url,
            'youtube_url' => $this->youtube_url,
            'date' => $this->date?->toDateString(),
        ];
    }
}
