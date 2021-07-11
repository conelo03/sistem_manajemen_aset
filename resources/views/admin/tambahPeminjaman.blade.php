@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>PEMINJAMAN</h3>
    </div>
    <form action="/admin/peminjaman/tambah" method="post">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama Aset</label>
              <select name="aset" id="aset" class="mySelect2" required>
                <option selected disabled></option>
                @foreach($aset as $aset)
                  <option value="{{ $aset->id }}">{{ $aset->nama_aset }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama Peminjam</label>
              <input type="text" id="input-username" class="form-control" placeholder="Nama Peminjam" name="peminjam" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Lokasi Peminjaman</label>
              <input type="text" class="form-control" placeholder="Lokasi Peminjaman" name="lokasi_peminjaman" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Tanggal Peminjaman</label>
              <input type="date" id="input-username" class="form-control" placeholder="Tanggal Peminjaman" name="tanggal_peminjaman" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Tanggal Kembali</label>
              <input type="date" id="input-username" class="form-control" placeholder="Tanggal Kembali" name="tanggal_kembali" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Waktu Peminjaman</label>
              <input type="text" id="input-username" class="form-control" placeholder="Waktu Peminjaman" name="waktu_peminjaman" required>
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