<?php

namespace App\Http\Controllers\StaffKeuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\Maintenance;
use App\Models\Anggaran;

class StaffKeuanganController extends Controller
{
  private $pengadaan;
  private $maintenance;
  private $anggaran;
  
  public function __construct()
  {
    $this->pengadaan    = new Pengadaan;
    $this->maintenance  = new Maintenance;
    $this->anggaran     = new Anggaran;
  }

  public function index()
  {
    $anggaran = $this->anggaran->first();

    $collection   = collect($this->pengadaan->get());

    $aset = $collection->map(function ($item) {
      return $item['harga_aset'] * $item['quantity'];
    });

    $data['p_realisasi']  = $aset->sum();
    $data['p_anggaran']   = $anggaran->anggaran_pengadaan;
    $data['p_pengadaan']  = $aset->sum() / $anggaran->anggaran_pengadaan * 100;

    $collection   = collect($this->maintenance->get());

    $maintenance  = $collection->map(function ($item) {
      return $item['biaya'];
    });

    $data['m_realisasi']    = $maintenance->sum();
    $data['m_anggaran']     = $anggaran->anggaran_maintenance;
    $data['m_maintenance']  = $maintenance->sum() / $anggaran->anggaran_maintenance * 100;
    return view('staff_keuangan/dashboard', $data);
  }
}
