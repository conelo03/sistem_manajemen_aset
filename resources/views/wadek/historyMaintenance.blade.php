@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>MAINTENANCE HISTORY</h3>
    </div>
    <div class="card-body">
      <a href="/wadek/maintenance/print_history" target="_blank" class="btn btn-primary mb-3">Cetak</a>
      <div class="table-responsive">
        <table class="table" id="myTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Aset</th>
              <th scope="col">Jenis Aset</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Biaya</th>
              <th scope="col">Tanggal Maintenance</th>
              <th scope="col">Nama Mitra</th>
              <th scope="col">Kode Mitra</th>
              <th scope="col">Tanggal Selesai</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($maintenance as $maintenance)
              <tr>
                <td>{{ $maintenance->kode_maintenance }}</td>
                <td>{{ $maintenance->aset->nama_aset }}</td>
                <td>{{ $maintenance->aset->jenis_aset }}</td>
                <td>{{ $maintenance->lokasi }}</td>
                <td>{{ rupiah($maintenance->biaya) }}</td>
                <td>{{ tgl_indo($maintenance->tanggal_maintenance) }}</td>
                <td>{{ $maintenance->mitra->nama_mitra }}</td>
                <td>{{ $maintenance->mitra->kode_mitra }}</td>
                <td>{{ tgl_indo($maintenance->tanggal_selesai) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection