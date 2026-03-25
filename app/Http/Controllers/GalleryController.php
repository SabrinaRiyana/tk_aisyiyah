<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Suggestion;
use App\Models\Fasilitas; 

class GalleryController extends Controller
{
    public function index()
    {
        // Ambil data dari database, urutkan dari yang terbaru
        $galleryFromDb = Gallery::latest()->get();
        $suggestionsHome = Suggestion::latest()->take(3)->get();
        $suggestionsAll = Suggestion::latest()->get();
        $fasilitas = Fasilitas::limit(6)->get();


        // Oper data ke view (asumsi nama file view kamu adalah galeri.blade.php)
        return view('galeri', compact('galleryFromDb', 'suggestionsHome', 
        'suggestionsAll','fasilitas'));
    }
}
