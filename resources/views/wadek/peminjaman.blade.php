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
              <th scope="col">Nama Peminjam</th>
              <th scope="col">Lokasi Peminjaman</th>
              <th scope="col">Asal Barang</th>
              <th scope="col">Rencana Kembali</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach ($peminjaman as $peminjaman)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $peminjaman->aset->kode_aset }}</td>
                <td>{{ $peminjaman->aset->nama_aset }}</td>
                <td>{{ $peminjaman->peminjam }}</td>
                <td>{{ $peminjaman->lokasi_peminjaman }}</td>
                <td>{{ $peminjaman->asal_barang }}</td>
                <td>{{ tgl_indo($peminjaman->rencana_kembali) }}</td>
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
                          <a href="/wadek/peminjaman/update_status/terima/{{ $peminjaman->id }}" class="btn btn-success">Terima</a>
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
                          <a href="/wadek/peminjaman/update_status/tolak/{{ $peminjaman->id }}" class="btn btn-danger">Tolak</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#detail{{ $peminjaman->id }}">Detail</button>

                  <!-- Modal -->
                  <div class="modal fade" id="detail{{ $peminjaman->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Merk</label>
                            <p class="form-control">{{ $peminjaman->aset->merk }}</p>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Jenis Aset</label>
                            <p class="form-control">{{ $peminjaman->aset->jenis_aset }}</p>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Tanggal Peminjaman</label>
                            <p class="form-control">{{ tgl_indo($peminjaman->tanggal_peminjaman) }}</p>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Tanggal Kembali</label>
                            <p class="form-control">{{ tgl_indo($peminjaman->tanggal_kembali) }}</p>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">NIM</label>
                            <p class="form-control">{{ $peminjaman->nim }}</p>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Email</label>
                            <p class="form-control">{{ $peminjaman->email }}</p>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">No. Telepon</label>
                            <p class="form-control">{{ $peminjaman->no_telp }}</p>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  @if ($peminjaman->status == NULL)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#selesai{{ $peminjaman->id }}">Selesai</button>
  
                    <!-- Modal -->
                    <div class="modal fade" id="selesai{{ $peminjaman->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Selesai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Mengubah status menjadi selesai?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/laboran/peminjaman/update_status/selesai/{{ $peminjaman->id }}" class="btn btn-success">Selesai</a>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#hilang{{ $peminjaman->id }}">Hilang</button>
  
                    <!-- Modal -->
                    <div class="modal fade" id="hilang{{ $peminjaman->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hilang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Mengubah status menjadi hilang?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/laboran/peminjaman/update_status/hilang/{{ $peminjaman->id }}" class="btn btn-warning">Hilang</a>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#rusak{{ $peminjaman->id }}">Rusak</button>
  
                    <!-- Modal -->
                    <div class="modal fade" id="rusak{{ $peminjaman->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Rusak</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Mengubah status menjadi Rusak?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/laboran/peminjaman/update_status/rusak/{{ $peminjaman->id }}" class="btn btn-danger">Rusak</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif

                  <a href="/laboran/peminjaman/edit/{{ $peminjaman->id }}" class="btn btn-sm btn-success">Edit</a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus{{ $peminjaman->id }}">
                    Hapus
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="hapus{{ $peminjaman->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin akan menghapus data peminjaman?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="/laboran/peminjaman/hapus/{{ $peminjaman->id }}" class="btn btn-danger">Hapus</a>
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