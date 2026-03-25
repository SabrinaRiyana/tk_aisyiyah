<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolDetail extends Model
{
    protected $casts = [
    'reasons' => 'array',    
    ];
    protected $fillable = ['history', 'reason_title', 'reasons', 'image_path'];
}
