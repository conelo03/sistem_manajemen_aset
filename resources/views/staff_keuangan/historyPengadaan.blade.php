@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>HISTORY PENGADAAN</h3>
    </div>
    <div class="card-body">
      <a href="/keuangan/pengadaan/print_history" target="_blank" class="btn btn-primary mb-3">Cetak</a>
      <div class="table-responsive">
        <table class="table" id="myTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nomor Pengadaan</th>
              <th scope="col">Nama Aset</th>
              <th scope="col">Jenis Merk</th>
              <th scope="col">Jenis Aset</th>
              <th scope="col">Quantity</th>
              <th scope="col">Harga Aset</th>
              <th scope="col">Tanggal Input</th>
              <th scope="col">Nama Mitra</th>
              <th scope="col">Kode Mitra</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach ($pengadaan as $pengadaan)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $pengadaan->no_pengadaan }}</td>
                <td>{{ $pengadaan->nama_aset }}</td>
                <td>{{ $pengadaan->merk }}</td>
                <td>{{ $pengadaan->jenis_aset }}</td>
                <td>{{ $pengadaan->quantity }}</td>
                <td>{{ rupiah($pengadaan->harga_aset) }}</td>
                <td>{{ tgl_indo(substr($pengadaan->tanggal_input, 0, 10)) }}</td>
                <td>{{ $pengadaan->mitra->nama_mitra }}</td>
                <td>{{ $pengadaan->mitra->kode_mitra }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection