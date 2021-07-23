@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>PEMINJAMAN</h3>
    </div>
    <div class="card-body">
      <a href="/wadek/peminjaman/tambah" class="btn btn-primary mb-3">Tambah</a>
      <a href="/wadek/peminjaman/print" class="btn btn-primary mb-3" target="_blank">Cetak</a>
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
              <th scope="col">No.</th>
              <th scope="col">Kode Aset</th>
              <th scope="col">Nama Aset</th>
              <th scope="col">Merk</th>
              <th scope="col">Jenis Aset</th>
              <th scope="col">Nama Peminjam</th>
              <th scope="col">Lokasi Peminjaman</th>
              <th scope="col">Tanggal Peminjaman</th>
              <th scope="col">Tanggal Kembali</th>
              <th scope="col">Waktu Peminjaman</th>
              <th scope="col">NIM/NIP</th>
              <th scope="col">Email</th>
              <th scope="col">No. Telepon</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach ($peminjaman as $peminjaman)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $peminjaman->aset->kode_aset }}</td>
                <td>{{ $peminjaman->aset->nama_aset }}</td>
                <td>{{ $peminjaman->aset->merk }}</td>
                <td>{{ $peminjaman->aset->jenis_aset }}</td>
                <td>{{ $peminjaman->peminjam }}</td>
                <td>{{ $peminjaman->lokasi_peminjaman }}</td>
                <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                <td>{{ $peminjaman->tanggal_kembali }}</td>
                <td>{{ $peminjaman->waktu_peminjaman }}</td>
                <td>{{ $peminjaman->nip }}</td>
                <td>{{ $peminjaman->email }}</td>
                <td>{{ $peminjaman->no_telepon }}</td>
                <td>
                  @switch($peminjaman->status_wadek)
                    @case(null)
                      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#terima{{ $peminjaman->id }}">Terima</button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#tolak{{ $peminjaman->id }}">Tolak</button>
                      @break

                    @case('terima')
                      <button type="button" class="btn btn-sm btn-success" readonly>Diterima</button>
                      @break

                    @case('tolak')
                      <button type="button" class="btn btn-sm btn-danger" readonly>Ditolak</button>
                      @break

                    @default
                        Default case...
                  @endswitch
                  
                  <div class="modal fade" id="terima{{ $peminjaman->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Terima</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menerima data peminjaman ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/wadek/peminjaman/terima/{{ $peminjaman->id }}" class="btn btn-success">Terima</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="modal fade" id="tolak{{ $peminjaman->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tolak</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menolak data peminjaman ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/wadek/peminjaman/tolak/{{ $peminjaman->id }}" class="btn btn-danger">Tolak</a>
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