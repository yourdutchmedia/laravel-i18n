<?php

namespace Ydm\I18N\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // If the user is logged in.
        $user = auth()->user();
        if ($user && isset(auth()->user()->locale)) {
            if (in_array(auth()->user()->locale, config('i18n.locales'))) {
                app()->setLocale(auth()->user()->locale);
            }
        }

        // If the user is not logged in.
        if (
            session()->has('locale') &&
            in_array(session()->get('locale'), config('i18n.locales', ['en']))
        ) {
            app()->setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}
