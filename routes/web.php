<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/ppdb/pin', [PpdbController::class, 'showPinForm']);
Route::post('/ppdb/check-pin', [PpdbController::class, 'checkPin'])
    ->name('ppdb.checkPin');

/* ================= SUGGESTION ================= */

Route::post('/suggestion', [SuggestionController::class, 'store'])->name('suggestion.store');


/* ================= HOME ================= */
Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/profil', [TeacherController::class, 'index'])->name('profil');

Route::get('/storage-link', function() {
    Artisan::call('storage:link');
    return 'Storage linked!';
});

/* ================= SITEMAP ================= */
Route::get('/sitemap.xml', function () {
    $baseUrl = 'https://tkaisyiyah-mimika.sch.id';
    $urls = [
        ['loc' => $baseUrl . '/',       'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => $baseUrl . '/galeri',  'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => $baseUrl . '/profil',  'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => $baseUrl . '/ppdb',    'priority' => '0.9', 'changefreq' => 'monthly'],
    ];
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($urls as $url) {
        $xml .= "  <url>\n";
        $xml .= "    <loc>{$url['loc']}</loc>\n";
        $xml .= "    <changefreq>{$url['changefreq']}</changefreq>\n";
        $xml .= "    <priority>{$url['priority']}</priority>\n";
        $xml .= "  </url>\n";
    }
    $xml .= '</urlset>';
    return response($xml, 200)->header('Content-Type', 'text/xml');
});