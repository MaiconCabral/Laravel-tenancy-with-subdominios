<?php

namespace App\Tenant\Scopes;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        // $tenant = $manager->tenant();
        // $posts = Post::where('tenant_id', $tenant->id)->get();
        if(app()->runningInConsole()){
            return;
        }
        
       $tenant = app(ManagerTenant::class)->indentify();
       $builder->where('tenant_id',$tenant);

    }
}