<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History Pengadaan</title>
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
  <div class="text-center"><strong>HISTORY PENGADAAN ASET</strong></div>
  <br>
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
      </tr>
    </thead>
    <tbody>
      @foreach ($pengadaan as $pengadaan)
        <tr>
          <td>{{ $pengadaan->no_pengadaan }}</td>
          <td>{{ $pengadaan->aset->nama_aset }}</td>
          <td>{{ $pengadaan->aset->jenis_aset }}</td>
          <td>{{ $pengadaan->quantity }}</td>
          <td>{{ $pengadaan->mitra->kode_mitra }}</td>
          <td>{{ $pengadaan->mitra->nama_mitra }}</td>
          <td>{{ rupiah($pengadaan->harga_aset) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <script>
    window.print();
  </script>
</body>
</html>