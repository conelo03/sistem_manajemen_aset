<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maintenance</title>
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
  <div class="text-center"><strong>MAINTENANCE ASET</strong></div>
  <br>
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
  <script>
    window.print();
  </script>
</body>
</html>