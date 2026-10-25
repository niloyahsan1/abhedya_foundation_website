<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePortalDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $portalDomain = config('app.portal_domain');
        $portalUrl = config('app.portal_url');

        if (! $portalDomain || ! $portalUrl) {
            return $next($request);
        }

        $host = $request->getHost();

        // 1. If accessing via the portal subdomain
        if ($host === $portalDomain) {
            // Root path of portal domain should redirect directly to dashboard
            if ($request->is('/') || $request->path() === '/') {
                return redirect()->to('/dashboard');
            }

            return $next($request);
        }

        // 2. If accessing via the main domain, redirect dashboard and auth paths to the portal
        if ($request->is('dashboard*') || $request->is('login*') || $request->is('two-factor*') || $request->is('otp*')) {
            $targetUrl = rtrim($portalUrl, '/').$request->getRequestUri();

            return redirect()->to($targetUrl);
        }

        return $next($request);
    }
}
