<?php

namespace App\Http\Resources\Course;

use App\Http\Resources\Lecture\LectureResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'objectives' => $this->objectives,
            'cover' => mediaUrl($this->cover),
            'lectures_count' => $this->lectures_count ?? 0,
            'lectures' => LectureResource::collection($this->whenLoaded('lectures')),
        ];
    }
}
