<?php

use App\Http\Controllers\User\TwoFactorAuthenticationController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\User\TeamController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => 'auth:web'
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/2fa', [TwoFactorAuthenticationController::class, 'index'])->name('2fa');

    Route::get('store/create', [StoreController::class, 'create'])->name('store.create');
    Route::post('store', [StoreController::class, 'store'])->name('store.store');

    Route::middleware(['user.has.store'])->group(function () {
        Route::get('store/edit', [StoreController::class, 'edit'])->name('store.edit');
        Route::put('store', [StoreController::class, 'update'])->name('store.update');
        Route::resource('products', ProductController::class);

        //team Routes
        Route::get('team', [TeamController::class, 'index'])->name('team.index');
        Route::get('team/create', [TeamController::class, 'create'])->name('team.create');
        Route::post('team', [TeamController::class, 'store'])->name('team.store');
        Route::get('team/edit/{member}', [TeamController::class, 'edit'])->name('team.edit');
        Route::put('team/update/{member}', [TeamController::class, 'update'])->name('team.update');
        Route::delete('team/destroy/{member}', [TeamController::class, 'destroy'])->name('team.destroy');
    });
});
