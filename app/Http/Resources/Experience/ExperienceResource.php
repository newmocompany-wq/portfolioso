<?php

namespace App\Http\Resources\Experience;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'organization' => $this->organization,
            'from' => $this->from,
            'to' => $this->to,
            'description' => $this->description,
            'responsibilities' => $this->responsibilities,
        ];
    }
}
