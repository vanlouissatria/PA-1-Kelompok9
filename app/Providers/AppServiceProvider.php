<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
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

        if (! function_exists('image_url')) {
            function image_url(?string $value, string $default = null): string
            {
                if (empty($value)) {
                    return $default ? asset($default) : '';
                }

                if (Str::startsWith($value, ['data:', 'http://', 'https://'])) {
                    return $value;
                }

                if (file_exists(public_path($value))) {
                    return asset($value);
                }

                $storagePath = storage_path('app/public/' . ltrim($value, '/'));
                if (file_exists($storagePath)) {
                    return asset('storage/' . ltrim($value, '/'));
                }

                return asset($value);
            }
        }
    }
}