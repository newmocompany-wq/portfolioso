<?php

namespace App\Http\Resources\About;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'bio' => $this->bio,
            'vision' => $this->vision,
            'skills' => $this->skills,
            'interests' => $this->interests,
        ];
    }
}
