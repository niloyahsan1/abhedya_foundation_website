<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = ['bn', 'en'];

        // Allow query param or form input switch (?lang=bn, locale=en, etc.)
        $requestedLocale = $request->query('lang') 
            ?? $request->input('lang') 
            ?? $request->input('locale');

        if ($requestedLocale && in_array($requestedLocale, $supportedLocales, true)) {
            $request->session()->put('locale', $requestedLocale);
        }

        // Determine current locale (default to 'bn')
        $locale = $request->session()->get('locale', config('app.locale', 'bn'));

        if (!in_array($locale, $supportedLocales, true)) {
            $locale = 'bn';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
