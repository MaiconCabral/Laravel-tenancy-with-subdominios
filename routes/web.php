<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('tenant-404', 'errors.404-tenant')->name('tenant.404');

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'home'])->name('home.blog');
Route::get('/post/{id}', [HomeController::class, 'post'])->name('blog.post');

//subdomain_main
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create/posts', [PostController::class, 'create'])->name('posts.create');
    Route::post('/store/posts', [PostController::class, 'store'])->name('posts.store');
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create/categories', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store/categories', [CategoryController::class, 'store'])->name('categories.store');
});

require __DIR__.'/auth.php';
