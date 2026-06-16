<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
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
            'course_id' => 'required|integer|exists:courses,id',
            'title' => 'required|string|min:3|max:255',
            'pdf' => 'nullable',
            'video_url' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ];

        if ($this->isMethod('PUT')) {
            $data['course_id'] = 'sometimes|integer|exists:courses,id';
            $data['title'] = 'sometimes|string|min:3|max:255';
        }

        return $data;
    }
}
