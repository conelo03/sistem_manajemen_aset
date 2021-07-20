<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\Asets;
use App\Models\Mitra;

class PengadaanController extends Controller
{
  private $pengadaan;
  private $aset;
  private $mitra;

  public function __construct()
  {
    $this->pengadaan  = new Pengadaan;
    $this->aset       = new Asets;
    $this->mitra      = new Mitra;
  }

  public function index()
  {
    $pengadaan = $this->pengadaan->all();
    return view('keuangan/pengadaan', ['pengadaan' => $pengadaan]);
  }
  
  public function edit($id)
  {
    $pengadaan          = $this->pengadaan->find($id);
    $pengadaan['aset']  = $this->aset->all();
    $pengadaan['mitra'] = $this->mitra->all();
    return view('keuangan/editPengadaan', $pengadaan);
  }
  
  public function update(Request $request, $id)
  {
    $pengadaan_baru = $this->pengadaan->find($id);

    $pengadaan_baru->no_pengadaan  = $request->no_pengadaan;
    $pengadaan_baru->tanggal_input = $request->tanggal_input;
    $pengadaan_baru->aset_id       = $request->aset;
    $pengadaan_baru->quantity      = $request->quantity;
    $pengadaan_baru->mitra_id      = $request->mitra;
    $pengadaan_baru->harga_aset    = preg_replace('/[Rp. ]/', '', $request->harga_aset);


    $pengadaan_baru->save();

    return redirect('/keuangan/pengadaan')->with('status', 'Berhasil edit data pengadaan.');
  }
  
  public function destroy($id)
  {
    $pengadaan_baru = $this->pengadaan->find($id);
    $pengadaan_baru->delete();
    return back()->with('status', 'Berhasil hapus data aset.');
  }

  public function history()
  {
    $pengadaan = $this->pengadaan->where('status', 'terima')->get();
    return view('keuangan/historyPengadaan', ['pengadaan' => $pengadaan]);
  }
  
  public function updateStatus($status, $id)
  {
    $pengadaan_baru = $this->pengadaan->find($id);

    $pengadaan_baru->status_keuangan  = $status;
    
    $pengadaan_baru->save();

    $pengadaan_baru = $this->pengadaan->find($id);
    if ($pengadaan_baru->status_keuangan !== NULL && $pengadaan_baru->status_keuangan !== NULL && $pengadaan_baru->status_keuangan !== NULL) {
      if ($pengadaan_baru->status_keuangan == 'terima' && $pengadaan_baru->status_keuangan == 'terima' && $pengadaan_baru->status_keuangan == 'terima') {
        $pengadaan_baru->status = 'terima';
      } else {
        $pengadaan_baru->status = 'tolak';
      }
      $pengadaan_baru->save();
    }
    return redirect('/keuangan/pengadaan')->with('status', 'Berhasil ' . $status . ' data pengadaan.');
  }
}
