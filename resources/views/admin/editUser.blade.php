@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>DATA ASET</h3>
    </div>
    <form action="/admin/manajemen_user/edit/{{ $id }}" method="post">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. Induk</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Induk" name="no_induk" required value="{{ $no_induk }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama</label>
              <input type="text" id="input-username" class="form-control" placeholder="Nama" name="nama" required value="{{ $nama }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Username</label>
              <input type="text" id="input-username" class="form-control" placeholder="Username" name="username" required value="{{ $username }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Password</label>
              <input type="password" id="input-username" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Jabatan</label>
              <input type="text" id="input-username" class="form-control" placeholder="Jabatan" name="jabatan" required value="{{ $jabatan }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. Telp</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Telp" name="no_telp" required value="{{ $no_telp }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Alamat</label>
              <input type="text" id="input-username" class="form-control" placeholder="Alamat" name="alamat" required value="{{ $alamat }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Role</label>
              <select name="role" id="role" class="form-control" required>
                <option value="admin" <?= $role == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="keuangan" <?= $role == 'keuangan' ? 'selected' : ''; ?>>Keuangan</option>
                <option value="laboran" <?= $role == 'laboran' ? 'selected' : ''; ?>>Laboran</option>
                <option value="wadek" <?= $role == 'wadek' ? 'selected' : ''; ?>>Wadek</option>
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
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Anda yakin akan mengedit user?
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