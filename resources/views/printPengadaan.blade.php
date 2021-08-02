<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengadaan</title>
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
  <div class="text-center"><strong>PENGADAAN ASET</strong></div>
  <br>
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
  <script>
    window.print();
  </script>
</body>
</html>