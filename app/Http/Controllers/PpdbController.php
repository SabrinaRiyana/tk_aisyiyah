<?php

namespace App\Http\Controllers;

use App\Models\PpdbSetting;
use App\Models\PpdbRegistration;
use App\Models\Pin;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $setting = PpdbSetting::first();

        return view('ppdb', compact('setting'));
    }

    /**
     * Verifikasi PIN sebelum masuk ke formulir.
     */
    public function checkPin(Request $request)
    {
        $request->validate([
            'kode_pin' => 'required'
        ]);

        $pin = Pin::where('kode_pin', $request->kode_pin)
                    ->where('status', 'aktif')
                    ->first();

        if (!$pin) {
            return back()->with('error', 'PIN tidak valid atau sudah dipakai.');
        }

        // Simpan status validasi ke dalam session
        session([
            'pin_valid' => true,
            'pin_id' => $pin->id
        ]);

        return redirect('/ppdb')->with('success', 'PIN Berhasil diverifikasi!');
    }

    /**
     * Simpan data pendaftaran dan matikan PIN.
     */
    public function store(Request $request)
    {
        // 1. CEK SESSION PIN (Keamanan tambahan)
        if (!session('pin_valid')) {
            return redirect()->route('ppdb.index')->with('error', 'Sesi pendaftaran habis atau PIN belum diisi.');
        }

        $payload = $request->input('payload', []);
        $files = $request->file('files', []);
        $finalData = is_array($payload) ? $payload : [];

        // 2. PROSES UPLOAD FILE (Jika ada)
        foreach ($files as $label => $file) {
            if ($file) {
                $path = $file->store('ppdb_attachments', 'public');
                $finalData[$label] = $path;
            }
        }

        // 3. SIMPAN DATA KE DATABASE
        $registration = PpdbRegistration::create([
            'payload' => $finalData,
            'status' => 'Success'
        ]);

        // 4. UBAH STATUS PIN MENJADI 'DIPAKAI'
        // Bagian dalam function store()
        $pinId = session('pin_id'); // Ambil ID yang disimpan pas checkPin

        if ($pinId) {
            \App\Models\Pin::where('id', $pinId)->update([
                'status' => 'dipakai'
            ]);
        }

        // 5. BERSIHKAN SESSION PIN
        session()->forget(['pin_valid', 'pin_id']);

        // 6. REDIRECT BACK DENGAN DATA SUKSES
        // Ini akan memicu tampilan @if(session('form_success')) di Blade
        return redirect()->back()->with([
            'form_success' => true,
            'reg_id' => $registration->id
        ]);
    }

    /**
     * Cetak bukti pendaftaran.
     */
    public function print($id)
    {
        $data = PpdbRegistration::findOrFail($id);

        return view('ppdb-print', compact('data'));
    }
}