@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>MAINTENANCE</h3>
    </div>
    <form action="/laboran/maintenance/tambah" method="post">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-username">Kode Maintenance</label>
              <input type="text" id="input-username" class="form-control" placeholder="Kode Maintenance" name="kode_maintenance" required>
            </div>
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
              <label class="form-control-label" for="input-username">Lokasi</label>
              <input type="text" id="input-username" class="form-control" placeholder="Lokasi" name="lokasi" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Biaya</label>
              <input type="text" id="rupiah" class="form-control" placeholder="Biaya" name="biaya" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Tanggal Maintenance</label>
              <input type="date" class="form-control" placeholder="Tanggal Maintenance" name="tanggal_maintenance" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama Mitra</label>
              <select name="mitra" id="mitra" class="form-control mySelect2" required>
                <option selected disabled></option>
                @foreach($mitra as $mitra)
                  <option value="{{ $aset->id }}">{{ $mitra->nama_mitra }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Tanggal selesai</label>
              <input type="date" class="form-control" placeholder="Tanggal selesai" name="tanggal_selesai" required>
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