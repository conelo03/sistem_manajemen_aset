@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>DATA ASET</h3>
    </div>
    <div class="card-body">
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
              <th scope="col">Aksi</th>
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
                <td>
                  <a href="/keuangan/data_aset/edit/{{ $aset->id }}" class="btn btn-success">Edit</a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $aset->id }}">
                    Hapus
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="hapus{{ $aset->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menghapus data aset dengan kode {{ $aset->kode_aset }}?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/keuangan/data_aset/hapus/{{ $aset->id }}" class="btn btn-danger">Hapus</a>
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