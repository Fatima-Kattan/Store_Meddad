<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        PaginationPaginator::useBootstrap();
        validator::extend('filter', function ($attribute, $value) {
            if ($value === 'bar') {
                return false;
            }
            if ($value === 'food') {
                return false;
            }
            return true;
        }, 'The :attribute not allowed.');
    }
}
