<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;

class KeuanganController extends Controller
{

  public function index()
  {
    return view('keuangan/dashboard');
  }
}
