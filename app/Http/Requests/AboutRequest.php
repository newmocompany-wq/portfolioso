<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'bio' => 'required|string|min:3',
            'vision' => 'required|string|min:3',
            'skills' => 'required|array',
            'skills.*.name' => 'required|string|max:255',
            'skills.*.level' => 'required|integer|min:0|max:100',
            'interests' => 'required|array',
            'interests.*' => 'string',
        ];

        if ($this->isMethod('PUT')) {
            $data['bio'] = 'sometimes|string|min:3';
            $data['vision'] = 'sometimes|string|min:3';
            $data['skills'] = 'sometimes|array';
            $data['interests'] = 'sometimes|array';
        }

        return $data;
    }
}
