<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Si un día tienes admin:
        if ($request->is('admin/*')) {
            return route('admin.login');
        }

        // Default: psicólogos
        return route('psychologist.login');
    }
}