<?php

namespace App\Http\Resources\Lecture;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LectureCollection extends ResourceCollection
{
    /**
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'lectures' => LectureResource::collection($this->collection),
            'count' => $this->count(),
        ];
    }
}
