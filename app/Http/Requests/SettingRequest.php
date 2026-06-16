<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'doctor_name' => 'required|string|max:255',
            'icon' => 'required',
            'favicon' => 'required',
        ];

        if ($this->isMethod('PUT')) {
            $data['doctor_name'] = 'sometimes|string|max:255';
            $data['icon'] = 'sometimes';
            $data['favicon'] = 'sometimes';
        }

        return $data;
    }
}
