@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>MANAJEMEN USER</h3>
    </div>
    <div class="card-body">
      <a href="/admin/manajemen_user/tambah" class="btn btn-primary mb-3">Tambah</a>
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <div class="table-responsive">
        <table class="table" id="myTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No. Induk</th>
              <th scope="col">Nama</th>
              <th scope="col">Username</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Alamat</th>
              <th scope="col">No. Telp</th>
              <th scope="col">Role</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $user)
              <tr>
                <td>{{ $user->no_induk }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->jabatan }}</td>
                <td>{{ $user->alamat }}</td>
                <td>{{ $user->no_telp }}</td>
                <td>{{ $user->role }}</td>
                <td>
                  <a href="/admin/manajemen_user/edit/{{ $user->id }}" class="btn btn-success">Edit</a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $user->id }}">
                    Hapus
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="hapus{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menghapus data user dengan nama {{ $user->nama }}?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/admin/manajemen_user/hapus/{{ $user->id }}" class="btn btn-danger">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection