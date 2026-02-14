<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', config('app.locale', 'es'));
        \Illuminate\Support\Facades\Log::info('SetLocale Middleware: Current locale in session: ' . $locale);
        
        $allowed = ['es', 'en'];

        if (in_array($locale, $allowed, true)) {
            app()->setLocale($locale);
            \Illuminate\Support\Facades\Log::info('SetLocale Middleware: Locale set to ' . $locale);
        } else {
             app()->setLocale(config('app.fallback_locale', 'es'));
        }

        return $next($request);
    }
}