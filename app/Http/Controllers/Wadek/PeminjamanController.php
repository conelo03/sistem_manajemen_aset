<?php

namespace App\Http\Controllers\Wadek;

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
    return view('wadek/peminjaman', ['peminjaman' => $peminjaman]);
  }

  public function history()
  {
    $peminjaman = $this->peminjaman->where('status', 'terima')->get();
    return view('admin/historyPeminjaman', ['peminjaman' => $peminjaman]);
  }
  
  public function updateStatus($status, $id)
  {
    $peminjaman_baru = $this->peminjaman->find($id);

    $peminjaman_baru->status_wadek  = $status;
    
    $peminjaman_baru->save();

    $peminjaman_baru = $this->peminjaman->find($id);
    if ($peminjaman_baru->status_kaur !== NULL && $peminjaman_baru->status_keuangan !== NULL && $peminjaman_baru->status_wadek !== NULL) {
      if ($peminjaman_baru->status_kaur == 'terima' && $peminjaman_baru->status_keuangan == 'terima' && $peminjaman_baru->status_wadek == 'terima') {
        $peminjaman_baru->status = 'terima';
      } else {
        $peminjaman_baru->status = 'tolak';
      }
      $peminjaman_baru->save();
    }
    return redirect('/wadek/peminjaman')->with('status', 'Berhasil edit data peminjaman.');
  }

  public function printHistory()
  {
    $peminjaman  = $this->peminjaman->where('status', 'terima')->get();
    return view('printHistoryPeminjaman', ['peminjaman' => $peminjaman]);
  }
}
