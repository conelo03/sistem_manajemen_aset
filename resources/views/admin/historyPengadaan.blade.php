@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>HISTORY PENGADAAN</h3>
    </div>
    <div class="card-body">
      <a href="/admin/pengadaan/print_history" target="_blank" class="btn btn-primary mb-3">Cetak</a>
      <div class="table-responsive">
        <table class="table" id="myTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nomor Pengadaan</th>
              <th scope="col">Nama Aset</th>
              <th scope="col">Jenis Aset</th>
              <th scope="col">Quantity</th>
              <th scope="col">Kode Mitra</th>
              <th scope="col">Nama Mitra</th>
              <th scope="col">Harga Aset</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengadaan as $pengadaan)
              <tr>
                <td>{{ $pengadaan->no_pengadaan }}</td>
                <td>{{ $pengadaan->nama_aset }}</td>
                <td>{{ $pengadaan->jenis_aset }}</td>
                <td>{{ $pengadaan->quantity }}</td>
                <td>{{ $pengadaan->mitra->kode_mitra }}</td>
                <td>{{ $pengadaan->mitra->nama_mitra }}</td>
                <td>{{ rupiah($pengadaan->harga_aset) }}</td>
                <td>{{ $pengadaan->status }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection