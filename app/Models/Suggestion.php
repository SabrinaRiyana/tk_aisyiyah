<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = [
    'nama',
    'rating',
    'pesan'
];

    protected $casts = [
        'rating' => 'integer',
    ];
}
