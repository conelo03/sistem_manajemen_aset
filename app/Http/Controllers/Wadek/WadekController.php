<?php

namespace App\Http\Controllers\Wadek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asets;
use App\Models\Pengadaan;
use App\Models\Maintenance;

class WadekController extends Controller
{
  private $aset;
  private $pengadaan;
  private $maintenance;
  
  public function __construct()
  {
    $this->aset         = new Asets;
    $this->pengadaan    = new Pengadaan;
    $this->maintenance  = new Maintenance;
  }

  public function index()
  {
    $data['total']            = $this->aset->count();
    $data['baik']             = $this->aset->where('kondisi', 'baik')->count();
    $data['maintenance']      = $this->aset->where('kondisi', 'maintenance')->count();
    $data['rusak']            = $this->aset->where('kondisi', 'rusak')->count();
    $data['institusi']        = $this->aset->where('jenis_aset', 'institusi')->count();
    $data['laboratorium']     = $this->aset->where('jenis_aset', 'laboratorium')->count();
    $data['dataLaboratorium'] = $this->aset->where('jenis_aset', 'laboratorium')->get();
    $data['dataInstitusi']    = $this->aset->where('jenis_aset', 'institusi')->get();

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
    
    return view('wadek/dashboard', $data);
  }
}
