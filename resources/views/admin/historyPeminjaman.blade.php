@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>PEMINJAMAN HISTORY</h3>
    </div>
    <div class="card-body">
      <a href="/admin/peminjaman/print_history" target="_blank" class="btn btn-primary mb-3">Cetak</a>
      <div class="table-responsive">
        <table class="table" id="myTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Kode Aset</th>
              <th scope="col">Nama Aset</th>
              <th scope="col">Jenis Aset</th>
              <th scope="col">Nama Peminjam</th>
              <th scope="col">Lokasi Peminjaman</th>
              <th scope="col">Tanggal Peminjaman</th>
              <th scope="col">Tanggal Kembali</th>
              <th scope="col">Asal Barang</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($peminjaman as $peminjaman)
              <tr>
                <td>{{ $peminjaman->aset->kode_aset }}</td>
                <td>{{ $peminjaman->aset->nama_aset }}</td>
                <td>{{ $peminjaman->aset->jenis_aset }}</td>
                <td>{{ $peminjaman->peminjam }}</td>
                <td>{{ $peminjaman->lokasi_peminjaman }}</td>
                <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                <td>{{ $peminjaman->tanggal_kembali }}</td>
                <td>{{ $peminjaman->asal_barang }}</td>
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