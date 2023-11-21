<?php

use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TenantController::class, 'index'])->name('tenant.index');
Route::get('/create', [TenantController::class, 'create'])->name('tenant.create');
Route::post('/add', [TenantController::class, 'store'])->name('tenant.store');

Route::get('/edit/{id}', [TenantController::class, 'edit'])->name('tenant.edit');
Route::put('/update/{id}', [TenantController::class, 'update'])->name('tenant.update');

Route::delete('/destroy/{id}', [TenantController::class, 'destroy'])->name('tenant.destroy');

Route::get('/views', function(){
    return 'Shie tenants';
});

Route::resource('/tenants', 'TenantController');