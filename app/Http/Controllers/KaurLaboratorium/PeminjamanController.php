<?php

namespace App\Http\Controllers\KaurLaboratorium;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Asets;

class PeminjamanController extends Controller
{
  private $peminjaman;
  private $aset;

  public function __construct()
  {
    $this->peminjaman = new Peminjaman;
    $this->aset       = new Asets;
  }

  public function index()
  {
    $peminjaman = $this->peminjaman->all();
    return view('kaur_laboratorium/peminjaman', ['peminjaman' => $peminjaman]);
  }
  
  public function create()
  {
    $aset   = $this->aset->all();
    return view('kaur_laboratorium/tambahPeminjaman', ['aset'  => $aset]);
  }
  
  public function store(Request $request)
  {
    // Validate the request...

    $this->peminjaman->aset_id       = $request->aset;
    $this->peminjaman->peminjam      = $request->peminjam;
    $this->peminjaman->lokasi_peminjaman      = $request->lokasi_peminjaman;
    $this->peminjaman->tanggal_peminjaman      = $request->tanggal_peminjaman;
    $this->peminjaman->tanggal_kembali = $request->tanggal_kembali;
    $this->peminjaman->waktu_peminjaman = $request->waktu_peminjaman;

    $this->peminjaman->save();

    return redirect('/kaur_laboratorium/peminjaman')->with('status', 'Berhasil tambah peminjaman.');
  }
  
  public function show($id)
  {
      //
  }
  
  public function edit($id)
  {
    $peminjaman         = $this->peminjaman->find($id);
    $peminjaman['aset'] = $this->aset->all();
    return view('kaur_laboratorium/editPeminjaman', $peminjaman);
  }
  
  public function update(Request $request, $id)
  {
    $peminjaman_baru = $this->peminjaman->find($id);

    $peminjaman_baru->aset_id             = $request->aset;
    $peminjaman_baru->peminjam            = $request->peminjam;
    $peminjaman_baru->lokasi_peminjaman   = $request->lokasi_peminjaman;
    $peminjaman_baru->tanggal_peminjaman  = $request->tanggal_peminjaman;
    $peminjaman_baru->tanggal_kembali     = $request->tanggal_kembali;
    $peminjaman_baru->waktu_peminjaman    = $request->waktu_peminjaman;

    $peminjaman_baru->save();

    return redirect('/kaur_laboratorium/peminjaman')->with('status', 'Berhasil edit data peminjaman.');
  }
  
  public function destroy($id)
  {
    $peminjaman_baru = $this->peminjaman->find($id);
    $peminjaman_baru->delete();
    return back()->with('status', 'Berhasil hapus data peminjaman.');
  }

  public function history()
  {
    $peminjaman = $this->peminjaman->all();
    return view('kaur_laboratorium/historyPeminjaman', ['peminjaman' => $peminjaman]);
  }
}
