<?php

namespace App\Domain\Admission\Requests;

use App\Admin\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class AdmissionFamilyDataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'inputs.*.type' => ['required'],
            'inputs.*.first_name' => ['required', 'min:3', 'max:255'],
            'inputs.*.last_name' => ['required', 'min:2', 'max:255'],
            'inputs.*.middle_name' => ['nullable', 'min:2', 'max:255'],
            'inputs.*.address' => ['required', 'min:6', 'max:255'],
            'inputs.*.email_address' => ['nullable', 'email'],
            'inputs.*.mobile_number' => ['required', 'min:11', 'max:11', new PhoneNumber()],
            'inputs.*.highest_educational_attainment' => ['required'],
            'inputs.*.occupation' => ['required', 'min:2', 'max:255'],
            'inputs.*.monthly_income' => ['required', 'min:2', 'max:255'],
            'inputs.*.company' => ['nullable', 'min:2', 'max:255'],
            'inputs.*.company_address' => ['nullable', 'min:2', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'inputs.*.type.required' => 'This type field is required.',
            'inputs.*.first_name.required' => 'This first name field is required.',
            'inputs.*.first_name.min' => 'This first name field must be at least 3 characters.',
            'inputs.*.first_name.max' => 'This first name field must be 255 characters lower.',
            'inputs.*.last_name.required' => 'This last name field is required.',
            'inputs.*.last_name.min' => 'This last name field must be at least 2 characters.',
            'inputs.*.last_name.max' => 'This last name field must be 255 characters lower.',
            'inputs.*.middle_name.min' => 'This middle name field must be at least 2 characters.',
            'inputs.*.middle_name.max' => 'This middle name field must be 255 characters lower.',
            'inputs.*.address.required' => 'This address field is required.',
            'inputs.*.address.min' => 'This address field must be at least 6 characters.',
            'inputs.*.address.max' => 'This address field must be 255 characters lower.',
            'inputs.*.mobile_number.required' => 'This mobile number field is required.',
            'inputs.*.mobile_number.min' => 'This mobile number field must be at least 11 characters.',
            'inputs.*.mobile_number.max' => 'This mobile number field must be 11 characters lower.',
            'inputs.*.highest_educational_attainment.required' => 'This educational attainment field is required.',
            'inputs.*.occupation.required' => 'This occupation field is required.',
            'inputs.*.occupation.min' => 'This occupation field must be at least 2 characters.',
            'inputs.*.occupation.max' => 'This occupation field must be 255 characters lower.',
            'inputs.*.monthly_income.required' => 'This monthly income field is required.',
            'inputs.*.monthly_income.min' => 'This monthly income field must be at least 2 characters.',
            'inputs.*.monthly_income.max' => 'This monthly income field must be 255 characters lower.',
            'inputs.*.company.min' => 'This company field must be at least 2 characters.',
            'inputs.*.company.max' => 'This company field must be 255 characters lower.',
            'inputs.*.company_address.min' => 'This company address field must be at least 2 characters.',
            'inputs.*.company_address.max' => 'This company address field must be 255 characters lower.',
            'inputs.*.email_address.email' => 'This email address field must be a valid email address.',
        ];
    }
}