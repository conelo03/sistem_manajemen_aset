<?php

namespace App\Http\Controllers\Wadek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asets;
use App\Models\Pengadaan;
use App\Models\Maintenance;
use App\Models\Anggaran;

class WadekController extends Controller
{
  private $aset;
  private $pengadaan;
  private $maintenance;
  private $anggaran;
  
  public function __construct()
  {
    $this->aset         = new Asets;
    $this->pengadaan    = new Pengadaan;
    $this->maintenance  = new Maintenance;
    $this->anggaran     = new Anggaran;
  }

  public function index()
  {
    $anggaran = $this->anggaran->first();

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
    $data['p_anggaran']   = $anggaran->anggaran_pengadaan;
    $data['p_pengadaan']  = $aset->sum() / $anggaran->anggaran_pengadaan * 100;

    $collection   = collect($this->maintenance->get());

    $maintenance  = $collection->map(function ($item) {
      return $item['biaya'];
    });

    $data['m_realisasi']    = $maintenance->sum();
    $data['m_anggaran']     = $anggaran->anggaran_maintenance;
    $data['m_maintenance']  = $maintenance->sum() / $anggaran->anggaran_maintenance * 100;
    
    return view('wadek/dashboard', $data);
  }
}
