<?php

namespace App\Http\Controllers;

use App\Models\PpdbSetting;
use App\Models\PpdbRegistration;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $setting = PpdbSetting::first();
        return view('ppdb', compact('setting'));
    }

    public function store(Request $request)
    {
        $payload = $request->input('payload', []);
        $files = $request->file('files', []);

        $finalData = is_array($payload) ? $payload : [];

        // Upload semua file
        foreach ($files as $label => $file) {
            if ($file) {
                $path = $file->store('ppdb_attachments', 'public');
                $finalData[$label] = $path;
            }
        }

        PpdbRegistration::create([
            'payload' => $finalData,
            'status' => 'pending'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mendaftar!'
        ]);
    }

    public function print($id)
    {
        $data = PpdbRegistration::findOrFail($id);
        return view('ppdb-print', compact('data'));
    }
}