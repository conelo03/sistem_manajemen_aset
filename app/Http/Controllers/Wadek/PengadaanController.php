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
    $pengadaan = $this->pengadaan->where('status', 'terima')->get();
    return view('wadek/historyPengadaan', ['pengadaan' => $pengadaan]);
  }
  
  public function updateStatus($status, $id)
  {
    $pengadaan_baru = $this->pengadaan->find($id);

    $pengadaan_baru->status_wadek  = $status;
    
    $pengadaan_baru->save();

    $pengadaan_baru = $this->pengadaan->find($id);
    if ($pengadaan_baru->status_wadek !== NULL && $pengadaan_baru->status_keuangan !== NULL && $pengadaan_baru->status_wadek !== NULL) {
      if ($pengadaan_baru->status_wadek == 'terima' && $pengadaan_baru->status_keuangan == 'terima' && $pengadaan_baru->status_wadek == 'terima') {
        $pengadaan_baru->status = 'terima';
      } else {
        $pengadaan_baru->status = 'tolak';
      }
      $pengadaan_baru->save();
    }
    return redirect('/wadek/pengadaan')->with('status', 'Berhasil ' . $status . ' data pengadaan.');
  }
}
