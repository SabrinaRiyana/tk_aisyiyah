<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    public function up(): void
    {
    Schema::create('fasilitas', function (Blueprint $table) {
        $table->id();
        $table->string('foto');
        $table->string('judul');
        $table->text('deskripsi');
        $table->boolean('is_tersedia')->default(true); // Untuk label hijau "Tersedia"
        $table->timestamps();
    });
    }

        protected $fillable = [
            'foto',
            'judul',
            'deskripsi',
            'is_tersedia',
        ];
}
