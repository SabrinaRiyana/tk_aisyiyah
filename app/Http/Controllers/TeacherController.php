<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolProfile;
use App\Models\Curriculum;
use App\Models\Teacher;
use App\Models\Banner;

class TeacherController extends Controller
{
    public function index() 
    {
        // Ambil data Kurikulum (Singleton)
        $profile = SchoolProfile::first();
        $curriculum = Curriculum::first();
        $teachers = Teacher::all(); 
        $banner = Banner::where('page', 'profil')->first();

        // Kirim semua ke satu view
        return view('profil', compact('profile', 'curriculum', 'teachers', 'banner'));
    }
}
