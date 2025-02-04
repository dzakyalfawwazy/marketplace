<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenuNavigationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductdetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('navigationrole', [MenuNavigationController::class, 'index'])->name('navigation');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('store')->name('store.')->middleware('role:store')->group(function(){

    Route::resource('products', ProductController::class);
});
Route::prefix('admin')->name('admin.')->middleware('role:owner')->group(function(){

    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductController::class);
    Route::name('productsdetails.')->group(function(){
        Route::get('{id_product}/productsdetails', [ProductdetailController::class,'index'])->name('index');
        Route::post('{id_product}/productsdetails', [ProductdetailController::class,'store'])->name('store');
        Route::get('{id_product}/productsdetails/{productdetail}/edit', [ProductdetailController::class,'edit'])->name('edit');
        Route::match(['put','patch'],'{id_product}/productsdetails/{productdetail}', [ProductdetailController::class,'update'])->name('update');
        Route::delete('{id_product}/productsdetails/{productdetail}', [ProductdetailController::class,'destroy'])->name('destroy');
    });
    Route::get('navigationrole', [MenuNavigationController::class, 'index'])->name('navigation');
});

require __DIR__.'/auth.php';
