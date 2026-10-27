<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \HasinHayder\TyroDashboard\Http\Controllers\ResourceController::class,
            \App\Http\Controllers\Admin\ResourceController::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        require_once app_path('Helpers/BanglaHelper.php');

        \Illuminate\Support\Facades\View::composer(['tyro-login::login', 'vendor.tyro-login.login'], function ($view) {
            $data = $view->getData();
            if (! isset($data['isAdminPortal'])) {
                $request = request();
                $host = $request->getHost();
                $portalDomain = config('app.portal_domain');
                $isAdminPortal = ($portalDomain && $host === $portalDomain) 
                    || str_starts_with($host, 'portal.') 
                    || $request->boolean('admin') 
                    || $request->is('admin/*');

                $view->with('isAdminPortal', $isAdminPortal);
            }
        });
    }
}
