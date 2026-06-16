<?php

namespace App\Http\Resources\Experience;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ExperienceCollection extends ResourceCollection
{
    /**
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'experiences' => ExperienceResource::collection($this->collection),
            'count' => $this->count(),
        ];
    }
}
