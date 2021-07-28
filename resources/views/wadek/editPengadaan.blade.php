@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>PENGADAAN</h3>
    </div>
    <form action="/wadek/pengadaan/edit/{{ $id }}" method="post">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. Pengadaan</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Pengadaan" name="no_pengadaan" required value="{{ $no_pengadaan }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama Aset</label>
              <input type="text" id="input-username" class="form-control" placeholder="Nama Aset" name="nama_aset" required value="{{ $nama_aset }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Jenis Aset</label>
              <input type="text" id="input-username" class="form-control" placeholder="Jenis Aset" name="jenis_aset" required value="{{ $jenis_aset }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Merk</label>
              <input type="text" id="input-username" class="form-control" placeholder="Merk" name="merk" required value="{{ $merk }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Quantity</label>
              <input type="text" id="input-username" class="form-control" placeholder="Quantity" name="quantity" required value="{{ $quantity }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Harga Aset</label>
              <input type="text" id="rupiah" class="form-control" placeholder="Harga Aset" name="harga_aset" required value="{{ $harga_aset }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Tanggal Input</label>
              <input type="date" id="input-username" class="form-control" placeholder="Tanggal Input" name="tanggal_input" required value="{{ $tanggal_input }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama Mitra</label>
              <select name="mitra" id="mitra" class="form-control mySelect2" required>
                <option selected disabled></option>
                @foreach($mitra as $mitra)
                  <option value="{{ $mitra->id }}" <?= $mitra_id == $mitra->id ? 'selected' : '' ; ?>>{{ $mitra->nama_mitra }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#edit">Edit</button>

        <!-- Modal -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Edit Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Anda yakin akan mengedit peminjaman?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary float-right" type="submit">Edit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection