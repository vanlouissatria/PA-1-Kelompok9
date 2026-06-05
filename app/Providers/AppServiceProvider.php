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

                $relativePath = ltrim($value, '/');
                $publicPath = public_path($relativePath);

                if (file_exists($publicPath)) {
                    return asset(str_replace('\\', '/', $relativePath));
                }

                if ($found = resolve_case_insensitive_path($publicPath)) {
                    $publicAsset = ltrim(str_replace(['\\', public_path()], ['/', ''], $found), '/');
                    return asset($publicAsset);
                }

                $storagePath = storage_path('app/public/' . $relativePath);
                if (file_exists($storagePath)) {
                    return asset('storage/' . str_replace('\\', '/', $relativePath));
                }

                if ($found = resolve_case_insensitive_path($storagePath)) {
                    $storageAsset = ltrim(str_replace(['\\', storage_path('app/public/')], ['/', ''], $found), '/');
                    return asset('storage/' . str_replace('\\', '/', $storageAsset));
                }

                return $default ? asset($default) : asset(str_replace('\\', '/', $relativePath));
            }

            function resolve_case_insensitive_path(string $path): ?string
            {
                if (file_exists($path)) {
                    return $path;
                }

                $directory = dirname($path);
                if (! is_dir($directory)) {
                    return null;
                }

                $filename = basename($path);
                foreach (scandir($directory) as $entry) {
                    if (strcasecmp($entry, $filename) === 0) {
                        $candidate = $directory . DIRECTORY_SEPARATOR . $entry;
                        if (is_file($candidate)) {
                            return $candidate;
                        }
                    }
                }

                return null;
            }
        }
    }
}