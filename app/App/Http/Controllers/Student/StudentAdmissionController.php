<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class StudentAdmissionController extends Controller
{
    public function index(): View
    {
        return view('users.student.admission.admission_history');
    }
}
