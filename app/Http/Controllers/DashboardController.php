<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $role = role_is(RoleEnum::student());

        return view('dashboard', compact('role'));
    }
}
