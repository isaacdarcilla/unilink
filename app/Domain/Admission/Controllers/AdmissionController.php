<?php

namespace Domain\Admission\Controllers;

use App\Admin\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdmissionController extends Controller
{
    public function index(): View
    {
        return view('users.student.admission.admission_history');
    }

    public function personal_data(?User $user): View
    {
        return view('users.student.admission.admission_personal_data', compact('user'));
    }
}
