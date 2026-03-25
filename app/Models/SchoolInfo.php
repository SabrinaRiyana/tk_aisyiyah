<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    protected $fillable = ['key', 'value'];

    public $timestamps = true;

    function schoolInfo($key, $default = null) {
    $info = SchoolInfo::where('key', $key)->first();
    return $info ? $info->value : $default;
    }
}
