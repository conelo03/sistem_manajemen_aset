@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>PENGADAAN</h3>
    </div>
    <form action="/staff_keuangan/pengadaan/tambah" method="post">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. Pengadaan</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Pengadaan" name="no_pengadaan" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama Aset</label>
              <input type="text" id="input-username" class="form-control" placeholder="Nama Aset" name="nama_aset" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Jenis Aset</label>
              <input type="text" id="input-username" class="form-control" placeholder="Jenis Aset" name="jenis_aset" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Merk</label>
              <input type="text" id="input-username" class="form-control" placeholder="Merk" name="merk" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Quantity</label>
              <input type="text" id="input-username" class="form-control" placeholder="Quantity" name="quantity" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Harga Aset</label>
              <input type="text" id="rupiah" class="form-control" placeholder="Harga Aset" name="harga_aset" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Tanggal Input</label>
              <input type="date" id="input-username" class="form-control" placeholder="Tanggal Input" name="tanggal_input" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama Mitra</label>
              <select name="mitra" id="mitra" class="form-control mySelect2" required>
                <option selected disabled></option>
                @foreach($mitra as $mitra)
                  <option value="{{ $mitra->id }}">{{ $mitra->nama_mitra }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary float-right mb-3" type="submit">Tambah</button>
      </div>
    </form>
  </div>
</div>
@endsection