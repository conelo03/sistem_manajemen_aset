<?php

namespace App\Http\Controllers\KaurLaboratorium;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Asets;

class KaurLaboratoriumController extends Controller
{
  private $aset;
  
  public function __construct()
  {
    $this->aset = new Asets;
  }

  public function index()
  {
    $data['total']        = $this->aset->count();
    $data['baik']         = $this->aset->where('kondisi', 'baik')->count();
    $data['maintenance']  = $this->aset->where('kondisi', 'maintenance')->count();
    $data['rusak']        = $this->aset->where('kondisi', 'rusak')->count();
    return view('kaur_laboratorium/dashboard', $data);
  }
}
