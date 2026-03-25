<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeacherController;
use App\Models\Fasilitas;
use App\Models\Suggestion;
use App\Models\Teacher;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

Route::view('/profil', 'profil');

Route::get('/galeri', function () {
    $fotos = Gallery::all();
    $fasilitas = Fasilitas::limit(6)->get();
    $suggestions = Suggestion::latest()->take(3)->get();

    return view('galeri', compact('fotos', 'fasilitas', 'suggestions'));
});

Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');

/* ================= PPDB ================= */

Route::get('/ppdb', [PpdbController::class, 'index']);
Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/{id}/print', [PpdbController::class, 'print'])->name('ppdb.print');

/* ================= SUGGESTION ================= */

Route::post('/suggestion', [SuggestionController::class, 'store']) ->name('suggestion.store');


/* ================= HOME ================= */
Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/profil', [TeacherController::class, 'index'])->name('profil');


