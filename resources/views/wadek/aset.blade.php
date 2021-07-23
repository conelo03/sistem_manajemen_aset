@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>DATA ASET</h3>
    </div>
    <div class="card-body">
      <a href="/wadek/data_aset/print" target="_blank" class="btn btn-primary mb-3">Cetak</a>
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
              <th scope="col">Kode Aset</th>
              <th scope="col">Nama Aset</th>
              <th scope="col">Jenis Aset</th>
              <th scope="col">Merk</th>
              <th scope="col">Kepemilikan</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Tanggal Pembelian</th>
              <th scope="col">Tanggal Maintenance</th>
              <th scope="col">Waktu Maintenance</th>
              <th scope="col">Kondisi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($aset as $aset)
              <tr>
                <td>{{ $aset->kode_aset }}</td>
                <td>{{ $aset->nama_aset }}</td>
                <td>{{ $aset->jenis_aset }}</td>
                <td>{{ $aset->merk }}</td>
                <td>{{ $aset->kepemilikan }}</td>
                <td>{{ $aset->lokasi }}</td>
                <td>{{ $aset->tanggal_pembelian }}</td>
                <td>{{ $aset->tanggal_maintenance }}</td>
                <td>{{ $aset->waktu_maintenance }}</td>
                <td>{{ $aset->kondisi }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection