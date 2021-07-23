<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Aset</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    header { position: fixed; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    footer { position: fixed; bottom: 60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
  </style>
</head>
<body>
  <img src="{{ asset('img') }}/headerAset.png" width="100%">
  <footer><img src="{{ asset('img') }}/footer.png" width="100%"></footer>
  <table class="table" id="myTable">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Kode Aset</th>
        <th scope="col">Nama Aset</th>
        <th scope="col">Jenis Aset</th>
        <th scope="col">Merk</th>
        <th scope="col">Lokasi</th>
        <th scope="col">Tanggal Pembelian</th>
        <th scope="col">Tanggal Maintenance</th>
        <th scope="col">Waktu Maintenance</th>
        <th scope="col">Kondisi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($aset as $aset)
        <tr>
          <td>{{ $aset->kode_aset }}</td>
          <td>{{ $aset->nama_aset }}</td>
          <td>{{ $aset->jenis_aset }}</td>
          <td>{{ $aset->merk }}</td>
          <td>{{ $aset->lokasi }}</td>
          <td>{{ $aset->tanggal_pembelian }}</td>
          <td>{{ $aset->tanggal_maintenance }}</td>
          <td>{{ $aset->waktu_maintenance }}</td>
          <td>{{ $aset->kondisi }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <script>
    window.print();
  </script>
</body>
</html>