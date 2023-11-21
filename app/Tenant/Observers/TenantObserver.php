<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TenantObserver
{
    public function creating(Model $model){

        if(app()->runningInConsole()){
            return;
        }
        
        $tenant = app(ManagerTenant::class)->indentify();
        $model->setAttribute('tenant_id',$tenant);
        
        
    }

    public function created(Model $model)
    {   
        // $model->cover = 'PR-'.$model->cover;
        // $model->save();
    }

}