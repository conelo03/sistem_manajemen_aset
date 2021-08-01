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
                  @if ($peminjaman->status != NULL)
                    @switch($peminjaman->status)
                      @case('selesai')
                        <button class="btn btn-success btn-sm">Selesai</button>
                        @break
                      @case('hilang')
                        <button class="btn btn-warning btn-sm">Warning</button>
                        @break
                      @case('rusak')
                        <button class="btn btn-danger btn-sm">Rusak</button>
                        @break
                    @endswitch
                  @endif
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