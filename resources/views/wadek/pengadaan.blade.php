@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>PENGADAAN</h3>
    </div>
    <div class="card-body">
      <a href="/wadek/pengadaan/print" target="_blank" class="btn btn-primary mb-3">Cetak</a>
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
              <th scope="col">Nomor Pengadaan</th>
              <th scope="col">Nama Aset</th>
              <th scope="col">Jenis Merk</th>
              <th scope="col">Jenis Aset</th>
              <th scope="col">Quantity</th>
              <th scope="col">Harga Aset</th>
              <th scope="col">Tanggal Input</th>
              <th scope="col">Nama Mitra</th>
              <th scope="col">Kode Mitra</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach ($pengadaan as $pengadaan)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $pengadaan->no_pengadaan }}</td>
                <td>{{ $pengadaan->aset->nama_aset }}</td>
                <td>{{ $pengadaan->aset->merk }}</td>
                <td>{{ $pengadaan->aset->jenis_aset }}</td>
                <td>{{ $pengadaan->quantity }}</td>
                <td>{{ rupiah($pengadaan->harga_aset) }}</td>
                <td>{{ tgl_indo(substr($pengadaan->tanggal_input, 0, 10)) }}</td>
                <td>{{ $pengadaan->mitra->nama_mitra }}</td>
                <td>{{ $pengadaan->mitra->kode_mitra }}</td>
                <td>
                  @switch($pengadaan->status_wadek)
                    @case(null)
                      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#terima{{ $pengadaan->id }}">Terima</button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#tolak{{ $pengadaan->id }}">Tolak</button>
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
                  
                  <div class="modal fade" id="terima{{ $pengadaan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Terima</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menerima data pengadaan ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/wadek/pengadaan/terima/{{ $pengadaan->id }}" class="btn btn-success">Terima</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="modal fade" id="tolak{{ $pengadaan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tolak</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menolak data pengadaan ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/wadek/pengadaan/tolak/{{ $pengadaan->id }}" class="btn btn-danger">Tolak</a>
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