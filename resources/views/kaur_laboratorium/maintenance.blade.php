@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>MAINTENANCE</h3>
    </div>
    <div class="card-body">
      <a href="/kaur_laboratorium/maintenance/tambah" class="btn btn-primary mb-3">Tambah</a>
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
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Aset</th>
              <th scope="col">Jenis Aset</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Biaya</th>
              <th scope="col">Tanggal Maintenance</th>
              <th scope="col">Nama Mitra</th>
              <th scope="col">Kode Mitra</th>
              <th scope="col">Tanggal Selesai</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
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
                <td>
                  @switch($maintenance->status_kaur)
                    @case(null)
                      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#terima{{ $maintenance->id }}">Terima</button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#tolak{{ $maintenance->id }}">Tolak</button>
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
                  
                  <div class="modal fade" id="terima{{ $maintenance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Terima</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menerima data maintenance ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/kaur_laboratorium/maintenance/update_status/terima/{{ $maintenance->id }}" class="btn btn-success">Terima</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="modal fade" id="tolak{{ $maintenance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tolak</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menolak data maintenance ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/kaur_laboratorium/maintenance/update_status/tolak/{{ $maintenance->id }}" class="btn btn-danger">Tolak</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <a href="/kaur_laboratorium/maintenance/edit/{{ $maintenance->id }}" class="btn btn-success btn-sm">Edit</a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $maintenance->id }}">
                    Hapus
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="hapus{{ $maintenance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menghapus data maintenance?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/kaur_laboratorium/maintenance/hapus/{{ $maintenance->id }}" class="btn btn-danger">Hapus</a>
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