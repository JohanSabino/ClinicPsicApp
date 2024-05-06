<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function showLoginForm(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('admin.login');
    }
}
