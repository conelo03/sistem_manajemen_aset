<?php

namespace App\Http\Controllers\StaffKeuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;

class StaffKeuanganController extends Controller
{
  private $pengadaan;
  
  public function __construct()
  {
    $this->pengadaan  = new Pengadaan;
  }

  public function index()
  {
    $tgl_awal       = date('Y')-10;
    $tgl_akhir      = date('Y')+3;
    $data_pengadaan = [];
    for ($i = $tgl_awal; $i <= $tgl_akhir; $i++) {
      $pengadaan          = $this->pengadaan->whereYear('tanggal_input', $i)->get();
      $data_pengadaan[$i] = 0;
      foreach ($pengadaan as $key) {
        $data_pengadaan[$i] += $key['harga_aset'];
      }
    }
    $pengadaan['data_pengadaan']  = $data_pengadaan;
    return view('staff_keuangan/dashboard', $pengadaan);
  }
}
