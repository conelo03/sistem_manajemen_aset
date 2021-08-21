<?php

namespace App\Http\Controllers\Wadek;

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
    return view('wadek/peminjaman', ['peminjaman' => $peminjaman]);
  }
  
  public function destroy($id)
  {
    $peminjaman_baru = $this->peminjaman->find($id);
    $peminjaman_baru->delete();
    return back()->with('status', 'Berhasil hapus data peminjaman.');
  }

  public function history()
  {
    $peminjaman = $this->peminjaman->whereNotNull('status')->get();
    return view('laboran/historyPeminjaman', ['peminjaman' => $peminjaman]);
  }
  
  public function print()
  {
    $peminjaman = $this->peminjaman->all();
    return view('printPeminjaman', ['peminjaman' => $peminjaman]);
  }

  public function printHistory()
  {
    $peminjaman  = $this->peminjaman->whereNotNull('status')->get();
    return view('printHistoryPeminjaman', ['peminjaman' => $peminjaman]);
  }

  public function updateStatus($status, $id)
  {
    $peminjaman_baru = $this->peminjaman->find($id);
    
    $peminjaman_baru->status_wadek  = $status;

    $peminjaman_baru->save();

    return redirect('/wadek/peminjaman')->with('status', 'Berhasil edit ubah status.');
  }
}
