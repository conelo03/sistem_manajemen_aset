<?php

namespace App\Http\Controllers\StaffKeuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;

class StaffKeuanganController extends Controller
{

  public function index()
  {
    return view('staff_keuangan/dashboard');
  }
}
