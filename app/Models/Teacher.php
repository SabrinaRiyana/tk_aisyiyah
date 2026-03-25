<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    public function profil()
    {
    // 1. Ambil data dari database
    $teachers = Teacher::all(); 

    // 2. Kirim data ke view menggunakan compact
    return view('profil', compact('teachers'));
    }
    protected $fillable = 
    [
        'foto', 
        'nama', 
        'jabatan', 
        'urutan'
    ];
}
