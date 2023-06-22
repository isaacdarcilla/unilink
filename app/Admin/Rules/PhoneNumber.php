<?php

namespace App\Admin\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumber implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!str($value)->startsWith("09")) {
            $fail('The :attribute must start with 09.');
        }
    }
}
