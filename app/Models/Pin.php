<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    protected $fillable = [
        'kode_pin',
        'status'
    ];
    protected $casts = [
        'payload' => 'array',
    ];
}
