<?php

namespace App\Http\Controllers\KaurLaboratorium;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Asets;
use App\Models\Peminjaman;

class KaurLaboratoriumController extends Controller
{
  private $aset;
  private $peminjaman;
  
  public function __construct()
  {
    $this->aset       = new Asets;
    $this->peminjaman = new Peminjaman;
  }

  public function index()
  {
    $data['total']              = $this->aset->count();
    $data['baik']               = $this->aset->where('kondisi', 'baik')->count();
    $data['maintenance']        = $this->aset->where('kondisi', 'maintenance')->count();
    $data['rusak']              = $this->aset->where('kondisi', 'rusak')->count();
    $data['peminjaman_selesai'] = $this->peminjaman->where('status', 'selesai')->count();
    $data['peminjaman_hilang']  = $this->peminjaman->where('status', 'hilang')->count();
    $data['peminjaman_rusak']   = $this->peminjaman->where('status', 'rusak')->count();
    return view('kaur_laboratorium/dashboard', $data);
  }
}
