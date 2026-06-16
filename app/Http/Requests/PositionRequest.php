<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $data = [
            'title' => 'required|string|min:2|max:255',
            'organization' => 'required|string|min:2|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
        ];

        if ($this->isMethod('PUT')) {
            $data['title'] = 'sometimes|string|min:2|max:255';
            $data['organization'] = 'sometimes|string|min:2|max:255';
        }

        return $data;
    }
}
