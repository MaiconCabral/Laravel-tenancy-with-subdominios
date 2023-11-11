<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return 'hom tenant admin';
});

Route::get('/views', function(){
    return 'Shie tenants';
});

Route::resource('/tenants', 'TenantController');