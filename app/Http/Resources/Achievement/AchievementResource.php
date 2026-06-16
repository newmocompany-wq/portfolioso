<?php

namespace App\Http\Resources\Achievement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
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
            'full_description' => $this->full_description,
            'cover' => mediaUrl($this->cover),
            'date' => $this->date?->toDateString(),
            'category' => $this->category,
            'live_link' => $this->live_link,
            'gallery' => collect($this->gallery ?? [])->map(fn ($img) => mediaUrl($img))->all(),
        ];
    }
}
