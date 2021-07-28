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
  private $mitra;
  
  public function __construct()
  {
    $this->pengadaan  = new Pengadaan;
    $this->mitra      = new Mitra;
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

  public function printHistory()
  {
    $pengadaan  = $this->pengadaan->where('status', 'terima')->get();
    return view('printHistoryPengadaan', ['pengadaan' => $pengadaan]);
  }
  
  public function print()
  {
    $pengadaan = $this->pengadaan->all();
    return view('printPengadaan', ['pengadaan' => $pengadaan]);
  }
  
  public function edit($id)
  {
    $pengadaan          = $this->pengadaan->find($id);
    $pengadaan['mitra'] = $this->mitra->all();
    return view('wadek/editPengadaan', $pengadaan);
  }
  
  public function update(Request $request, $id)
  {
    $pengadaan_baru = $this->pengadaan->find($id);

    $pengadaan_baru->no_pengadaan  = $request->no_pengadaan;
    $pengadaan_baru->tanggal_input = $request->tanggal_input;
    $pengadaan_baru->nama_aset     = $request->nama_aset;
    $pengadaan_baru->jenis_aset    = $request->jenis_aset;
    $pengadaan_baru->merk          = $request->merk;
    $pengadaan_baru->quantity      = $request->quantity;
    $pengadaan_baru->mitra_id      = $request->mitra;
    $pengadaan_baru->harga_aset    = preg_replace('/[Rp. ]/', '', $request->harga_aset);

    $pengadaan_baru->save();

    return redirect('/wadek/pengadaan')->with('status', 'Berhasil edit data pengadaan.');
  }
  
  public function destroy($id)
  {
    $pengadaan_baru = $this->pengadaan->find($id);
    $pengadaan_baru->delete();
    return back()->with('status', 'Berhasil hapus data aset.');
  }
}
