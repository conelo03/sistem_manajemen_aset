@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>TAMBAH PEMINJAMAN</h3>
    </div>
    <form action="/laboran/peminjaman/tambah" method="post">
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
            <div class="form-group">
              <label class="form-control-label" for="input-username">NIM/NIP</label>
              <input type="text" id="input-username" class="form-control" placeholder="NIM/NIP" name="nip" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Email</label>
              <input type="email" id="input-username" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. Telepon</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Telepon" name="no_telepon" required>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambah">Tambah</button>

        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tambah Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Anda yakin akan menambah peminjaman?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary float-right" type="submit">Tambah</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection