<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'avatar' => mediaUrl($this->avatar),
            'department' => $this->department,
            'university' => $this->university,
            'phone' => $this->phone,
            'office' => $this->office,
            'office_hours' => $this->office_hours,
            'address' => $this->address,
            'cv' => mediaUrl($this->cv),
            'social_links' => $this->social_links,
            'contact_email' => $this->contact_email,
        ];
    }
}
