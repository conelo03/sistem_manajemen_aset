@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>PEMINJAMAN</h3>
    </div>
    <div class="card-body">
      <a href="/laboran/peminjaman/tambah" class="btn btn-primary mb-3">Tambah</a>
      <a href="/laboran/peminjaman/print" class="btn btn-primary mb-3" target="_blank">Cetak</a>
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
              <th scope="col">Asal Barang</th>
              <th scope="col">NIM/NIP</th>
              <th scope="col">Email</th>
              <th scope="col">No. Telepon</th>
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
                <td>{{ $peminjaman->aset->merk }}</td>
                <td>{{ $peminjaman->aset->jenis_aset }}</td>
                <td>{{ $peminjaman->peminjam }}</td>
                <td>{{ $peminjaman->lokasi_peminjaman }}</td>
                <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                <td>{{ $peminjaman->tanggal_kembali }}</td>
                <td>{{ $peminjaman->asal_barang }}</td>
                <td>{{ $peminjaman->nip }}</td>
                <td>{{ $peminjaman->email }}</td>
                <td>{{ $peminjaman->no_telepon }}</td>
                <td>
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
                  @else
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
                <td>
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