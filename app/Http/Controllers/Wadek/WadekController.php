<?php

namespace App\Http\Controllers\Wadek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asets;

class WadekController extends Controller
{
  private $aset;
  
  public function __construct()
  {
    $this->aset  = new Asets;
  }

  public function index()
  {
    $data['total']            = $this->aset->count();
    $data['baik']             = $this->aset->where('kondisi', 'baik')->count();
    $data['maintenance']      = $this->aset->where('kondisi', 'maintenance')->count();
    $data['rusak']            = $this->aset->where('kondisi', 'rusak')->count();
    $data['institusi']        = $this->aset->where('jenis_aset', 'institusi')->count();
    $data['laboratorium']     = $this->aset->where('jenis_aset', 'laboratorium')->count();
    $data['dataLaboratorium'] = $this->aset->where('jenis_aset', 'laboratorium')->get();
    $data['dataInstitusi']    = $this->aset->where('jenis_aset', 'institusi')->get();
    return view('wadek/dashboard', $data);
  }
}
