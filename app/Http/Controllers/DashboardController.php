<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $role = role_is([
            RoleEnum::student()->value,
            RoleEnum::parent()->value,
        ]);

        return view('dashboard', compact('role'));
    }
}
