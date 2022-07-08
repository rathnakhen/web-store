<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index']);

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);

    // Use all the basic route for brand //
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
//    Route::resource('/brands', BrandController::class);

    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
});

require __DIR__.'/auth.php';
