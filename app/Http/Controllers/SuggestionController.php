<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestion;

class SuggestionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'pesan' => 'required|string|min:10',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Suggestion::create([
            'nama' => $validated['nama'],
            'pesan' => $validated['pesan'],
            'rating' => $validated['rating'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Masukan berhasil disimpan'
        ]);
    }
}