<?php

namespace App\Http\Controllers;

use App\Admin\Enums\RoleEnum;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $role = role_is([
            RoleEnum::student()->value,
            RoleEnum::parents()->value,
        ]);

        return view('dashboard', compact('role'));
    }
}
