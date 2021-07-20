<?php

namespace App\Http\Controllers\KaurLaboratorium;

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
    return view('kaur_laboratorium/pengadaan', ['pengadaan' => $pengadaan]);
  }

  public function create()
  {
    $aset   = $this->aset->all();
    $mitra  = $this->mitra->all();
    return view('kaur_laboratorium/tambahPengadaan', [
      'aset'  => $aset,
      'mitra' => $mitra
    ]);
  }
  
  public function store(Request $request)
  {
    // Validate the request...

    $this->pengadaan->no_pengadaan  = $request->no_pengadaan;
    $this->pengadaan->tanggal_input = $request->tanggal_input;
    $this->pengadaan->aset_id       = $request->aset;
    $this->pengadaan->quantity      = $request->quantity;
    $this->pengadaan->mitra_id      = $request->mitra;
    $this->pengadaan->harga_aset    = preg_replace('/[Rp. ]/', '', $request->harga_aset);

    $this->pengadaan->save();

    return redirect('/kaur_laboratorium/pengadaan')->with('status', 'Berhasil tambah pengadaan.');
  }
  
  public function updateStatus($status, $id)
  {
    $pengadaan_baru = $this->pengadaan->find($id);

    $pengadaan_baru->status_kaur  = $status;
    
    $pengadaan_baru->save();

    $pengadaan_baru = $this->pengadaan->find($id);
    if ($pengadaan_baru->status_kaur !== NULL && $pengadaan_baru->status_keuangan !== NULL && $pengadaan_baru->status_wadek !== NULL) {
      if ($pengadaan_baru->status_kaur == 'terima' && $pengadaan_baru->status_keuangan == 'terima' && $pengadaan_baru->status_wadek == 'terima') {
        $pengadaan_baru->status = 'terima';
      } else {
        $pengadaan_baru->status = 'tolak';
      }
      $pengadaan_baru->save();
    }
    return redirect('/kaur_laboratorium/pengadaan')->with('status', 'Berhasil edit data pengadaan.');
  }
  
  public function edit($id)
  {
    $pengadaan          = $this->pengadaan->find($id);
    $pengadaan['aset']  = $this->aset->all();
    $pengadaan['mitra'] = $this->mitra->all();
    return view('kaur_laboratorium/editPengadaan', $pengadaan);
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

    return redirect('/kaur_laboratorium/pengadaan')->with('status', 'Berhasil edit data pengadaan.');
  }
  
  public function destroy($id)
  {
    $pengadaan_baru = $this->pengadaan->find($id);
    $pengadaan_baru->delete();
    return back()->with('status', 'Berhasil hapus data aset.');
  }

  public function history()
  {
    $pengadaan = $this->pengadaan->all();
    return view('kaur_laboratorium/historyPengadaan', ['pengadaan' => $pengadaan]);
  }
}
