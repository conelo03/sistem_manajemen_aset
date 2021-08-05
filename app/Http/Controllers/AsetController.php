<?php

namespace App\Http\Controllers;

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
  
  public function asalBarang(Request $request)
  {
    $aset = $this->aset->find($request->id_aset)->first();
    return response()->json($aset);
  }
  
  public function destroy($id)
  {
    $aset = $this->aset->find($id);
    $aset->delete();
    return back()->with('status', 'Berhasil hapus data aset.');
  }
  
  public function print()
  {
    $aset = $this->aset->all();
    return view('printAset', ['aset' => $aset]);
  }
}
