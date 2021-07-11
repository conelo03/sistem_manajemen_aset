<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Asets;
use App\Models\Mitra;

class MaintenanceController extends Controller
{
  private $maintenance;
  private $aset;
  private $mitra;

  public function __construct()
  {
    $this->maintenance  = new Maintenance;
    $this->aset         = new Asets;
    $this->mitra        = new Mitra;
  }

  public function index()
  {
    $maintenance  = $this->maintenance->all();
    return view('admin/maintenance', ['maintenance' => $maintenance]);
  }
  
  public function create()
  {
    $aset   = $this->aset->all();
    $mitra  = $this->mitra->all();
    return view('admin/tambahMaintenance', [
      'aset'  => $aset,
      'mitra' => $mitra
    ]);
  }
  
  public function store(Request $request)
  {
    // Validate the request...

    $this->maintenance->kode_maintenance    = $request->kode_maintenance;
    $this->maintenance->tanggal_maintenance = $request->tanggal_maintenance;
    $this->maintenance->aset_id             = $request->aset;
    $this->maintenance->biaya               = preg_replace('/[Rp. ]/', '', $request->biaya);
    $this->maintenance->mitra_id            = $request->mitra;
    $this->maintenance->tanggal_selesai     = $request->tanggal_selesai;
    $this->maintenance->lokasi              = $request->lokasi;

    $this->maintenance->save();

    return redirect('/admin/maintenance')->with('status', 'Berhasil tambah maintenance.');
  }
  
  public function show($id)
  {
    $maintenance  = $this->maintenance->find($id);
    return view('admin/editMaintenance', $maintenance);
  }
  
  public function edit($id)
  {
    $maintenance          = $this->maintenance->find($id);
    $maintenance['aset']  = $this->aset->all();
    $maintenance['mitra'] = $this->mitra->all();
    return view('admin/editMaintenance', $maintenance);
  }
  
  public function update(Request $request, $id)
  {
    $maintenance_baru = $this->pengadaan->find($id);

    $maintenance_baru->kode_maintenance    = $request->kode_maintenance;
    $maintenance_baru->tanggal_maintenance = $request->tanggal_maintenance;
    $maintenance_baru->aset_id             = $request->aset;
    $maintenance_baru->biaya               = preg_replace('/[Rp. ]/', '', $request->biaya);
    $maintenance_baru->mitra_id            = $request->mitra;
    $maintenance_baru->tanggal_selesai     = $request->tanggal_selesai;
    $maintenance_baru->lokasi              = $request->lokasi;

    $this->maintenance->save();

    return redirect('/admin/maintenance')->with('status', 'Berhasil edit data maintenance.');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
