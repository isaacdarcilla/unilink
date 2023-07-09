<?php

namespace App\Domain\Admission\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionEducationDataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'inputs.*.level' => ['required'],
            'inputs.*.school' => ['required', 'min:6', 'max:255'],
            'inputs.*.degree' => ['required', 'min:3', 'max:255'],
            'inputs.*.inclusive_dates_from' => ['required', 'date_format:m/d/Y'],
            'inputs.*.inclusive_dates_to' => ['required', 'date_format:m/d/Y'],
            'inputs.*.honors' => ['nullable', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'inputs.*.level.required' => 'This level field is required.',
            'inputs.*.school.required' => 'This school attended field is required.',
            'inputs.*.school.min' => 'This school attended field must be at least 6 characters.',
            'inputs.*.school.max' => 'This school attended field must be 255 characters lower.',
            'inputs.*.degree.required' => 'This degree received field is required.',
            'inputs.*.degree.min' => 'This degree received field must be at least 6 characters.',
            'inputs.*.degree.max' => 'This degree received field must be 255 characters lower.',
            'inputs.*.inclusive_dates_from.required' => 'This inclusive date field is required.',
            'inputs.*.inclusive_dates_from.date_format' => 'This inclusive date field must match the format MM/DD/YYYY.',
            'inputs.*.inclusive_dates_to.required' => 'This inclusive date field is required.',
            'inputs.*.inclusive_dates_to.date_format' => 'This inclusive date field must match the format MM/DD/YYYY.',
            'inputs.*.honors.max' => 'This honors received field must be 255 characters lower.',
        ];
    }
}