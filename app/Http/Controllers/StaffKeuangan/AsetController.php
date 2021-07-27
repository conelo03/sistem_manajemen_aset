<?php

namespace App\Http\Controllers\Keuangan;

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
    return view('keuangan/aset', ['aset' => $aset]);
  }
  
  public function edit($id)
  {
    $aset = $this->aset->find($id);
    return view('keuangan/editAset', $aset);
  }
  
  public function update(Request $request, $id)
  {
    $aset_baru = $this->aset->find($id);

    $aset_baru->kode_aset            = $request->kode_aset;
    $aset_baru->nama_aset            = $request->nama_aset;
    $aset_baru->jenis_aset           = $request->jenis_aset;
    $aset_baru->merk                 = $request->merk;
    $aset_baru->kepemilikan          = $request->kepemilikan;
    $aset_baru->lokasi               = $request->lokasi;
    $aset_baru->tanggal_pembelian    = $request->tanggal_pembelian;
    $aset_baru->tanggal_maintenance  = $request->tanggal_maintenance;
    $aset_baru->waktu_maintenance    = $request->waktu_maintenance;
    $aset_baru->kondisi              = $request->kondisi;

    $aset_baru->save();

    return redirect('/keuangan/data_aset')->with('status', 'Berhasil edit data aset.');
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
