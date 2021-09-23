<?php

namespace App\Http\Controllers\StaffKeuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\Maintenance;

class StaffKeuanganController extends Controller
{
  private $pengadaan;
  private $maintenance;
  
  public function __construct()
  {
    $this->pengadaan    = new Pengadaan;
    $this->maintenance  = new Maintenance;
  }

  public function index()
  {
    $collection   = collect($this->pengadaan->get());

    $aset = $collection->map(function ($item) {
      return $item['harga_aset'] * $item['quantity'];
    });

    $data['p_realisasi']  = $aset->sum();
    $data['p_anggaran']   = 10000000000;
    $data['p_pengadaan']  = $aset->sum() / 10000000000 * 100;

    $collection   = collect($this->maintenance->get());

    $maintenance  = $collection->map(function ($item) {
      return $item['biaya'];
    });

    $data['m_realisasi']    = $maintenance->sum();
    $data['m_anggaran']     = 10000000000;
    $data['m_maintenance']  = $maintenance->sum() / 1000000000 * 100;
    return view('staff_keuangan/dashboard', $data);
  }
}
