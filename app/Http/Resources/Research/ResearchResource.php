<?php

namespace App\Http\Resources\Research;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResearchResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'year' => $this->year,
            'abstract' => $this->abstract,
            'authors' => $this->authors,
            'keywords' => $this->keywords,
            'journal' => $this->journal,
            'conference' => $this->conference,
            'doi' => $this->doi,
            'link' => $this->link,
            'pdf' => mediaUrl($this->pdf),
            'cover' => mediaUrl($this->cover),
        ];
    }
}
