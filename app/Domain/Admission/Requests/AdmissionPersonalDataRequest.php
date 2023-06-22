<?php

namespace App\Domain\Admission\Requests;

use App\Admin\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class AdmissionPersonalDataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:12', 'min:12', new PhoneNumber()],
        ];
    }
}
