<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
  private $peminjaman;

  public function __construct()
  {
    $this->peminjaman = new Peminjaman;
  }

  public function index()
  {
    $peminjaman = $this->peminjaman->all();
    return view('keuangan/peminjaman', ['peminjaman' => $peminjaman]);
  }
  
  public function destroy($id)
  {
    $peminjaman_baru = $this->peminjaman->find($id);
    $peminjaman_baru->delete();
    return back()->with('status', 'Berhasil hapus data peminjaman.');
  }

  public function history()
  {
    $peminjaman  = $this->peminjaman
                        ->where('status_wadek', 'terima')
                        ->where('status_keuangan', 'terima')
                        ->where('status_kaur', 'terima')
                        ->get();
    return view('laboran/historyPeminjaman', ['peminjaman' => $peminjaman]);
  }
  
  public function print()
  {
    $peminjaman = $this->peminjaman->all();
    return view('printPeminjaman', ['peminjaman' => $peminjaman]);
  }

  public function printHistory()
  {
    $peminjaman  = $this->peminjaman
                        ->where('status_wadek', 'terima')
                        ->where('status_keuangan', 'terima')
                        ->where('status_kaur', 'terima')
                        ->get();
    return view('printHistoryPeminjaman', ['peminjaman' => $peminjaman]);
  }

  public function updateStatus($status, $id)
  {
    $peminjaman_baru = $this->peminjaman->find($id);
    
    $peminjaman_baru->status_keuangan  = $status;

    $peminjaman_baru->save();

    return redirect('/keuangan/peminjaman')->with('status', 'Berhasil edit ubah status.');
  }
}
