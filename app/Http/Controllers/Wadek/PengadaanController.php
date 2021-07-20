<?php

namespace App\Http\Controllers\Wadek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\Asets;
use App\Models\Mitra;

class PengadaanController extends Controller
{
  private $pengadaan;
  
  public function __construct()
  {
    $this->pengadaan  = new Pengadaan;
  }

  public function index()
  {
    $pengadaan = $this->pengadaan->all();
    return view('wadek/pengadaan', ['pengadaan' => $pengadaan]);
  }

  public function history()
  {
    $pengadaan = $this->pengadaan->all();
    return view('wadek/historyPengadaan', ['pengadaan' => $pengadaan]);
  }
}
