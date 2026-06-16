<?php

namespace App\Http\Resources\ContactUs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactUsCollection extends ResourceCollection
{
    /**
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'messages' => ContactUsResource::collection($this->collection),
            'count' => $this->count(),
        ];
    }
}
