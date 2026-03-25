<?php

use App\Models\SchoolInfo;

if (!function_exists('schoolInfo')) {
    function schoolInfo($key, $default = null) {
        $info = SchoolInfo::where('key', $key)->first();
        return $info ? $info->value : $default;
    }
}