<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
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

                $relativePath = str_replace('\\', '/', ltrim($value, '/'));
                $publicPath = public_path($relativePath);

                if (file_exists($publicPath)) {
                    return Str::startsWith($relativePath, ['uploads/', 'image/'])
                        ? url('/' . $relativePath)
                        : asset($relativePath);
                }

                if ($found = resolve_case_insensitive_path($publicPath)) {
                    $publicAsset = ltrim(str_replace(['\\', public_path()], ['/', ''], $found), '/');
                    return Str::startsWith($publicAsset, ['uploads/', 'image/'])
                        ? url('/' . $publicAsset)
                        : asset($publicAsset);
                }

                $storageRelative = Str::startsWith($relativePath, 'storage/') ? substr($relativePath, 8) : $relativePath;
                $storagePath = storage_path('app/public/' . $storageRelative);

                if (file_exists($storagePath)) {
                    return url('/storage/' . str_replace('\\', '/', $storageRelative));
                }

                if ($found = resolve_case_insensitive_path($storagePath)) {
                    $storageAsset = ltrim(str_replace(['\\', storage_path('app/public/')], ['/', ''], $found), '/');
                    return url('/storage/' . str_replace('\\', '/', $storageAsset));
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