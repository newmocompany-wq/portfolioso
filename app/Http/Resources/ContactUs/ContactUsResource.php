<?php

namespace App\Http\Resources\ContactUs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'read' => $this->read,
            'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }
}
