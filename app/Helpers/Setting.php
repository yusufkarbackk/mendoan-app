<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('setting')) {
    /**
     * Ambil nilai setting dari tabel, cache selamanya.
     */
    function setting(string $key, $default = null)
    {
        return Cache::rememberForever("setting.$key", function () use ($key, $default) {
            return optional(
                Setting::where('key', $key)->first()
            )->value ?? $default;
        });
    }
}