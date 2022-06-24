<?php

use Illuminate\Support\Facades\Cache;
use Modules\Core\Models\Setting;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return Cache::rememberForever('setting.' . $key, function () use ($key) {
            return Setting::firstWhere('key', $key)?->value;
        }) ?: $default;
    }
}

if (!function_exists('isEmptyOrNull')) {
    function isEmptyOrNull($value): bool
    {
        if (!isset($value)) return true;
        if (empty($value)) return true;
        return false;
    }
}
