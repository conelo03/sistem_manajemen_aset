<?php

namespace App\Http\Controllers\Wadek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;

class WadekController extends Controller
{

  public function index()
  {
    return view('wadek/dashboard');
  }
}
