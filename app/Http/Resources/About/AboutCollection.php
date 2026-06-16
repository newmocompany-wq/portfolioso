<?php

namespace App\Http\Resources\About;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AboutCollection extends ResourceCollection
{
    /**
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'about' => AboutResource::collection($this->collection),
            'count' => $this->count(),
        ];
    }
}
