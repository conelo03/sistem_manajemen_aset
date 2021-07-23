<?php

namespace App\Http\Controllers\Wadek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asets;

class AsetController extends Controller
{
  private $aset;

  public function __construct()
  {
    $this->aset = new Asets;
  }
  
  public function index()
  {
    $aset = $this->aset->all();
    return view('wadek/aset', ['aset' => $aset]);
  }
  
  public function print()
  {
    $aset = $this->aset->all();
    return view('printAset', ['aset' => $aset]);
  }
}
