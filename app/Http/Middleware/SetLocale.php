<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', config('app.locale', 'es'));
        $allowed = ['es', 'en'];

        app()->setLocale(in_array($locale, $allowed, true) ? $locale : config('app.fallback_locale', 'es'));

        return $next($request);
    }
}