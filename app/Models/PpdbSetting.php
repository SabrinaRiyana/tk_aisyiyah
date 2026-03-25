<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpdbSetting extends Model
{
    protected $fillable = ['is_active', 'title', 'closed_message', 'form_fields'];
    

    protected $casts = [
        'form_fields' => 'array', // WAJIB ADA agar Filament bisa baca Repeater
        'is_active' => 'boolean',
    ];
}
