<?php
use App\Http\Controllers\Dashboard\CategoriesController as DashboardCategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\StoresController;
use App\Http\Controllers\Dashboard\TwoFactorAuthenticationController;
use App\Http\Controllers\Dashboard\UsersController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'/admin/dashboard', 'as'=>'dashboard.','middleware' => 'auth:admin'], function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('index');
    Route::get('/categories/index', [DashboardCategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [DashboardCategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [DashboardCategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [DashboardCategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}', [DashboardCategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{id}', [DashboardCategoriesController::class, 'destroy'])->name('categories.destroy');

    Route::resource('stores', StoresController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('users', UsersController::class);

    Route::get('/2fa', [TwoFactorAuthenticationController::class, 'index'])->name('admin.2fa');
    });


//Route::resource('categories',[CategoriesController::class])->except(['show']);

/* Route::get('/dashboard/index',[DashboardController::class,'index'])->name('dashboard.index');

Route::get('/dashboard/categories/index', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/dashboard/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/dashboard/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/dashboard/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/dashboard/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/dashboard/categories/delete/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
 */
