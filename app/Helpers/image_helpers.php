<?php

use Illuminate\Support\Str;

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
