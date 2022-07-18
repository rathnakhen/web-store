<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
    // Dashboard
    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');
    // Products
    //route search
    Route::resource('/products', ProductController::class);
    // Category
    Route::resource('/categories', CategoryController::class);

    //  Brand (Use all the basic route)
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

    // Admin Role & Permission
    Route::middleware(['auth'])->name('admin.')->prefix('/admin')->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermission'])->name('roles.permissions');
        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions', PermissionController::class);
        Route::resource('/users', UserController::class);
    });
});

require __DIR__.'/auth.php';
