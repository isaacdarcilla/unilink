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

    public function rules(?string $same_address): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'gender_preference' => ['required', 'string', 'max:255'],
            'region' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'barangay' => ['required'],
            'street' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'temporary_region' => $same_address ? ['nullable', 'max:255'] : ['required', 'max:255'],
            'temporary_province' => $same_address ? ['nullable', 'max:255'] : ['required', 'max:255'],
            'temporary_city' => $same_address ? ['nullable', 'max:255'] : ['required', 'max:255'],
            'temporary_barangay' => $same_address ? ['nullable', 'max:255'] : ['required', 'max:255'],
            'temporary_street' => $same_address ? ['nullable', 'max:255'] : ['required', 'string', 'max:255'],
            'temporary_zip_code' => $same_address ? ['nullable', 'max:255'] : ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:11', 'min:11', new PhoneNumber()],
            'landline_number' => ['nullable', 'string', 'max:255'],
            'email_address' => ['required', 'email', 'max:255'],
            'facebook_account' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'citizenship' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'number_of_siblings' => ['required', 'numeric', 'max:255'],
            'ages_of_siblings' => ['required', 'numeric', 'max:255'],
            'rank_in_family' => ['required', 'numeric', 'max:255'],
            'special_skills' => ['required'],
            'favorite_sports' => ['required'],
            'scholarship_grantee' => ['required', 'string', 'max:255'],
            'lrn' => ['required', 'string', 'max:12', 'min:12'],
            'program_first_choice' => ['required', 'string', 'max:255'],
            'program_second_choice' => ['required', 'string', 'max:255'],
            'program_third_choice' => ['required', 'string', 'max:255'],
            'gadget' => ['required'],
            'internet_status' => ['required', 'string', 'max:255'],
            'campus' => ['required'],
        ];
    }
}
