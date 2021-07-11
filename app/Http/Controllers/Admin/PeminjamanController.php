<?php

namespace App\Http\Controllers\Admin;

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
    return view('admin/peminjaman', ['peminjaman' => $peminjaman]);
  }
  
  public function create()
  {
    $aset   = $this->aset->all();
    return view('admin/tambahPeminjaman', ['aset'  => $aset]);
  }
  
  public function store(Request $request)
  {
    // Validate the request...

    $this->peminjaman->aset_id       = $request->aset;
    $this->peminjaman->peminjam      = $request->peminjam;
    $this->peminjaman->lokasi_peminjaman      = $request->lokasi_peminjaman;
    $this->peminjaman->tanggal_peminjaman      = $request->tanggal_peminjaman;
    $this->peminjaman->tanggal_kembali = $request->tanggal_kembali;
    $this->peminjaman->waktu_peminjaman = $request->waktu_peminjaman;

    $this->peminjaman->save();

    return redirect('/admin/peminjaman')->with('status', 'Berhasil tambah peminjaman.');
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
        //
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
        //
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
