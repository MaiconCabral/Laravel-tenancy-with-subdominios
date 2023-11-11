<?php

namespace App\Http\Middleware\Tenant;

use App\Tenant\ManagerTenant;
use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $manager = new ManagerTenant;
        $manager = app(ManagerTenant::class);
        // dd($manager->subdomain());
        $tenant = $manager->tenant();
       
        
        if(!$tenant && $request->url() != route('tenant.404')){
            return redirect()->route('tenant.404');
        }
        $this->setSession($tenant->only('name'));
        return $next($request);
    }

    public function setSession($tenant){
        session()->put('tenant', $tenant);
    }
}
