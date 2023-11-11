<?php 

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
   public function subdomain()
   {
        $piecesHost = explode('.', request()->getHost());

        return $piecesHost[0];
   } 

   public function tenant(){
        //verifca na base dados se o sub dominio existe
        $subdomain = $this->subdomain();
        $tenant = Tenant::Where('subdomain',$subdomain)->first();
        return $tenant;
    }

    public function indentify(){
        $tenant = $this->tenant();
        
        return $tenant->id;
    }
    
    public function coverPath(){
        $tenant = $this->tenant();

        return $tenant->subdomain;
    }

    public function isSubdomainMain(){
        $subdominio = $this->subdomain();
        $auxSubDominio = config('tenant.subdomain_main');
        return  $subdominio ==  $auxSubDominio;
    }

}