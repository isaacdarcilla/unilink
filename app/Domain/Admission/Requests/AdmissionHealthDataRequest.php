<?php

namespace App\Domain\Admission\Requests;

use App\Admin\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class AdmissionHealthDataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'height' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'string', 'max:255'],
            'facial_marks' => ['required', 'string', 'max:255'],
            'physical_condition' => ['required'],
            'emergency_contact' => ['required', 'string', 'max:255'],
            'relationship' => ['required'],
            'emergency_contact_address' => ['required'],
            'emergency_contact_number' => ['required', 'string', 'max:11', 'min:11', new PhoneNumber()],
        ];
    }
}