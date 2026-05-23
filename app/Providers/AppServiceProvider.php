<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 1. Import facade Paginator di bagian atas
use Illuminate\Pagination\Paginator;

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
        // 2. Tambahkan baris ini agar pagination menggunakan style Bootstrap 5
        Paginator::useBootstrapFive();
    }
}