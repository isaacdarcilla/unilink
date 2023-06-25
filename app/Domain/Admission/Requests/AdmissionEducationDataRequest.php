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
            'inputs.*.school_attended' => ['required', 'min:6', 'max:255'],
            'inputs.*.degree_received' => ['required', 'min:3', 'max:255'],
            'inputs.*.inclusive_date_from' => ['required', 'date_format:m/d/Y'],
            'inputs.*.inclusive_date_to' => ['required', 'date_format:m/d/Y'],
            'inputs.*.honors_received' => ['nullable', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'inputs.*.level.required' => 'This level field is required.',
            'inputs.*.school_attended.required' => 'This school attended field is required.',
            'inputs.*.school_attended.min' => 'This school attended field must be at least 6 characters.',
            'inputs.*.school_attended.max' => 'This school attended field must be 255 characters lower.',
            'inputs.*.degree_received.required' => 'This degree received field is required.',
            'inputs.*.degree_received.min' => 'This degree received field must be at least 6 characters.',
            'inputs.*.degree_received.max' => 'This degree received field must be 255 characters lower.',
            'inputs.*.inclusive_date_from.required' => 'This inclusive date field is required.',
            'inputs.*.inclusive_date_from.date_format' => 'This inclusive date field must match the format MM/DD/YYYY.',
            'inputs.*.inclusive_date_to.required' => 'This inclusive date field is required.',
            'inputs.*.inclusive_date_to.date_format' => 'This inclusive date field must match the format MM/DD/YYYY.',
            'inputs.*.honors_received.max' => 'This honors received field must be 255 characters lower.',
        ];
    }
}