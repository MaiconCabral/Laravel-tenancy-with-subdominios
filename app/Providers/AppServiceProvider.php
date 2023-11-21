<?php

namespace App\Providers;

use App\Tenant\ManagerTenant;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $manager = app(ManagerTenant::class);

        Blade::if('tenantmain', function() use ($manager) {
            return $manager->isSubdomainMain();
        });
       
        Blade::if('tenant', function() use ($manager) {
            return !$manager->isSubdomainMain();
        });

    }
}
