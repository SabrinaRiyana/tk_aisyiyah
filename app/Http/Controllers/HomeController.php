<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolDetail;


class HomeController extends Controller
{
    public function index()
    {
      $schoolDetail = SchoolDetail::first();

      return view('landing', compact(
        'schoolDetail', 
    ));
    }
}
