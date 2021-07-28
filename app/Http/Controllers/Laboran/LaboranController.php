<?php

namespace App\Http\Controllers\Laboran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asets;

class LaboranController extends Controller
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
    return view('laboran/dashboard', $data);
  }
}
