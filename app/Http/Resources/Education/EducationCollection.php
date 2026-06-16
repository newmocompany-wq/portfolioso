<?php

namespace App\Http\Resources\Education;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EducationCollection extends ResourceCollection
{
    /**
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'education' => EducationResource::collection($this->collection),
            'count' => $this->count(),
        ];
    }
}
