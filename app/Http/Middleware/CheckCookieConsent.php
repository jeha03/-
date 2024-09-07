<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class CheckCookieConsent
{
    public function handle($request, Closure $next)
    {
        if (!Cookie::get('cookie_consent')) {
            view()->share('showCookieConsent', true);
        }

        return $next($request);
    }
}
