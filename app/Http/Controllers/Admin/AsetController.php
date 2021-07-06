<?php

namespace App\Http\Controllers\Admin;

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

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $aset = $this->aset->all();
    return view('admin/aset', ['aset' => $aset]);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/tambahAset');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validate the request...

      $this->aset->kode_aset            = $request->kode_aset;
      $this->aset->nama_aset            = $request->nama_aset;
      $this->aset->jenis_aset           = $request->jenis_aset;
      $this->aset->kepemilikan          = $request->kepemilikan;
      $this->aset->lokasi               = $request->lokasi;
      $this->aset->tanggal_pembelian    = $request->tanggal_pembelian;
      $this->aset->tanggal_maintenance  = $request->tanggal_maintenance;
      $this->aset->waktu_maintenance    = $request->waktu_maintenance;
      $this->aset->kondisi              = $request->kondisi;

      $this->aset->save();

      return redirect('/admin/data_aset')->with('status', 'Berhasil tambah data aset.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aset = $this->aset->find($id);
        return view('admin/editAset', $aset);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $aset_baru = $this->aset->find($id);

      $aset_baru->kode_aset            = $request->kode_aset;
      $aset_baru->nama_aset            = $request->nama_aset;
      $aset_baru->jenis_aset           = $request->jenis_aset;
      $aset_baru->kepemilikan          = $request->kepemilikan;
      $aset_baru->lokasi               = $request->lokasi;
      $aset_baru->tanggal_pembelian    = $request->tanggal_pembelian;
      $aset_baru->tanggal_maintenance  = $request->tanggal_maintenance;
      $aset_baru->waktu_maintenance    = $request->waktu_maintenance;
      $aset_baru->kondisi              = $request->kondisi;

      $aset_baru->save();

      return redirect('/admin/data_aset')->with('status', 'Berhasil edit data aset.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Asets::destroy($id);
      $aset = $this->aset->find($id);
      $aset->delete();
      return back()->with('status', 'Berhasil hapus data aset.');
    }
}
