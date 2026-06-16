<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'degree' => 'required|string|min:2|max:255',
            'school' => 'required|string|min:2|max:255',
            'year' => 'required|string|max:50',
            'focus' => 'nullable|string',
            'order' => 'nullable|integer',
        ];

        if ($this->isMethod('PUT')) {
            $data['degree'] = 'sometimes|string|min:2|max:255';
            $data['school'] = 'sometimes|string|min:2|max:255';
            $data['year'] = 'sometimes|string|max:50';
        }

        return $data;
    }
}
