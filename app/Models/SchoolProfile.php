<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $fillable = ['visi', 'tujuan', 'misi'];
    protected $casts = [
        'misi' => 'array', // Ini WAJIB supaya Filament bisa baca datanya
    ];
}
