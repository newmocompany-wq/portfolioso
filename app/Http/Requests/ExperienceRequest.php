<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'position' => 'required|string|min:2|max:255',
            'organization' => 'required|string|min:2|max:255',
            'from' => 'required|string|max:50',
            'to' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'responsibilities' => 'nullable|array',
            'responsibilities.*' => 'string',
            'order' => 'nullable|integer',
        ];

        if ($this->isMethod('PUT')) {
            $data['position'] = 'sometimes|string|min:2|max:255';
            $data['organization'] = 'sometimes|string|min:2|max:255';
            $data['from'] = 'sometimes|string|max:50';
        }

        return $data;
    }
}
