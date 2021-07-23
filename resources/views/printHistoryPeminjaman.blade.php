<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History Peminjaman</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    header { position: fixed; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    footer { position: fixed; bottom: 60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
  </style>
</head>
<body>
  <img src="{{ asset('img') }}/header.png" width="100%">
  <footer><img src="{{ asset('img') }}/footer.png" width="100%"></footer>
  <br><br>
  <div class="text-center"><strong>FAKULTAS REKAYASA INDUSTRI UNIVERSITAS TELKOM</strong></div>
  <div class="text-center"><strong>HISTORY PEMINJAMAN ASET</strong></div>
  <br>
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
          <th scope="col">Waktu Peminjaman</th>
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
            <td>{{ $peminjaman->waktu_peminjaman }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  <script>
    window.print();
  </script>
</body>
</html>