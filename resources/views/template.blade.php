<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>
    @switch(auth()->user()->role)
      @case('admin')
        Admin
        @break
      @case('laboran')
        Laboran
        @break
      @case('wadek')
        Wakil Dekan 2
        @break
      @case('keuangan')
        Keuangan
        @break
      @case('kaur_laboratorium')
        Kaur Laboratorium
        @break
      @case('staff_keuangan')
        Staff Keuangan
        @break
    @endswitch
  </title>
  <!-- Favicon -->
  <link rel="icon" href="/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('css') }}/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ asset('@fortawesome') }}/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('css') }}/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner" style="height: 647px;margin-bottom: 0px;margin-right: 0px;max-height: none;background-color: #b12120;">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)" style="padding: 0.1rem;background-color: #a7a9ad;">
          <img src="{{ asset('img') }}/logo.png" class="navbar-brand-img" alt="..." width="100%" height="100%" style="max-height: 9rem;">
        </a>
      </div>
      <div class="navbar-inner" style="margin-top: 4rem;background-color: #b12120;">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">
                <span class="nav-link-text text-white">Dashboard</span>
              </a>
            </li>
            @switch(auth()->user()->role)
              @case('admin')
                <li class="nav-item">
                  <a class="nav-link" href="/admin/manajemen_user">
                    <span class="nav-link-text text-white">Manajemen User</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/data_aset">
                    <span class="nav-link-text text-white">Data Aset</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Pengadaan</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/admin/pengadaan" class="dropdown-item">
                      <span>Data Pengadaan</span>
                    </a>
                    <a href="/admin/pengadaan/history" class="dropdown-item">
                      <span>History Pengadaan</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Maintenance</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/admin/maintenance" class="dropdown-item">
                      <span>Data Maintenance</span>
                    </a>
                    <a href="/admin/maintenance/history" class="dropdown-item">
                      <span>History Maintenance</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Peminjaman</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/admin/peminjaman" class="dropdown-item">
                      <span>Data Peminjaman</span>
                    </a>
                    <a href="/admin/peminjaman/history" class="dropdown-item">
                      <span>History Peminjaman</span>
                    </a>
                  </div>
                </li>
                @break
              @case('laboran')
                <li class="nav-item">
                  <a class="nav-link" href="/laboran/manajemen_user">
                    <span class="nav-link-text text-white">Manajemen User</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/laboran/data_aset">
                    <span class="nav-link-text text-white">Data Aset</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Pengadaan</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/laboran/pengadaan" class="dropdown-item">
                      <span>Data Pengadaan</span>
                    </a>
                    <a href="/laboran/pengadaan/history" class="dropdown-item">
                      <span>History Pengadaan</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Maintenance</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/laboran/maintenance" class="dropdown-item">
                      <span>Data Maintenance</span>
                    </a>
                    <a href="/laboran/maintenance/history" class="dropdown-item">
                      <span>History Maintenance</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Peminjaman</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/laboran/peminjaman" class="dropdown-item">
                      <span>Data Peminjaman</span>
                    </a>
                    <a href="/laboran/peminjaman/history" class="dropdown-item">
                      <span>History Peminjaman</span>
                    </a>
                  </div>
                </li>
                @break
              @case('keuangan')
                <li class="nav-item">
                  <a class="nav-link" href="/keuangan/data_aset">
                    <span class="nav-link-text text-white">Data Aset</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Pengadaan</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/keuangan/pengadaan" class="dropdown-item">
                      <span>Data Pengadaan</span>
                    </a>
                    <a href="/keuangan/pengadaan/history" class="dropdown-item">
                      <span>History Pengadaan</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Maintenance</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/keuangan/maintenance" class="dropdown-item">
                      <span>Data Maintenance</span>
                    </a>
                    <a href="/keuangan/maintenance/history" class="dropdown-item">
                      <span>History Maintenance</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Peminjaman</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/keuangan/peminjaman" class="dropdown-item">
                      <span>Data Peminjaman</span>
                    </a>
                    <a href="/keuangan/peminjaman/history" class="dropdown-item">
                      <span>History Peminjaman</span>
                    </a>
                  </div>
                </li>
                @break
              @case('staff_keuangan')
                <li class="nav-item">
                  <a class="nav-link" href="/staff_keuangan/data_aset">
                    <span class="nav-link-text text-white">Data Aset</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Pengadaan</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/staff_keuangan/pengadaan" class="dropdown-item">
                      <span>Data Pengadaan</span>
                    </a>
                    <a href="/staff_keuangan/pengadaan/history" class="dropdown-item">
                      <span>History Pengadaan</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Maintenance</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/staff_keuangan/maintenance" class="dropdown-item">
                      <span>Data Maintenance</span>
                    </a>
                    <a href="/staff_keuangan/maintenance/history" class="dropdown-item">
                      <span>History Maintenance</span>
                    </a>
                  </div>
                </li>
                @break
              @case('wadek')
                <li class="nav-item">
                  <a class="nav-link" href="/wadek/data_aset">
                    <span class="nav-link-text text-white">Data Aset</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Pengadaan</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/wadek/pengadaan" class="dropdown-item">
                      <span>Data Pengadaan</span>
                    </a>
                    <a href="/wadek/pengadaan/history" class="dropdown-item">
                      <span>History Pengadaan</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Maintenance</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/wadek/maintenance" class="dropdown-item">
                      <span>Data Maintenance</span>
                    </a>
                    <a href="/wadek/maintenance/history" class="dropdown-item">
                      <span>History Maintenance</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Peminjaman</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/wadek/peminjaman" class="dropdown-item">
                      <span>Data Peminjaman</span>
                    </a>
                    <a href="/wadek/peminjaman/history" class="dropdown-item">
                      <span>History Peminjaman</span>
                    </a>
                  </div>
                </li>
                @break
              @case('kaur_laboratorium')
                <li class="nav-item">
                  <a class="nav-link" href="/kaur_laboratorium/data_aset">
                    <span class="nav-link-text text-white">Data Aset</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Pengadaan</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/kaur_laboratorium/pengadaan" class="dropdown-item">
                      <span>Data Pengadaan</span>
                    </a>
                    <a href="/kaur_laboratorium/pengadaan/history" class="dropdown-item">
                      <span>History Pengadaan</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Maintenance</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/kaur_laboratorium/maintenance" class="dropdown-item">
                      <span>Data Maintenance</span>
                    </a>
                    <a href="/kaur_laboratorium/maintenance/history" class="dropdown-item">
                      <span>History Maintenance</span>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="nav-link-text text-white">Peminjaman</span>
                  </a>
                  <div class="dropdown-menu  dropdown-menu-right ">
                    <a href="/kaur_laboratorium/peminjaman" class="dropdown-item">
                      <span>Data Peminjaman</span>
                    </a>
                    <a href="/kaur_laboratorium/peminjaman/history" class="dropdown-item">
                      <span>History Peminjaman</span>
                    </a>
                  </div>
                </li>
                @break
            @endswitch
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background-color: #a7a9ad;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="row">
            <div class="col-12"><h1>SISTEM INFORMASI MANAJEMEN ASET</h1></div>
            <div class="col-12"><h2 style="color: #3d8446;">FAKULTAS REKAYASA INDUSTRI</h2></div>
          </div>
        </div>
      </div>
    </nav>
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-xl-12">
          <div class="alert alert-secondary" role="alert" style="border-color: #090b0c;">
            @switch(auth()->user()->role)
              @case('admin')
                Selamat datang Admin!
                @break
              @case('laboran')
                Selamat datang Laboran!
                @break
              @case('keuangan')
                Selamat datang Keuangan!
                @break
              @case('wadek')
                Selamat datang Wakil Dekan 2!
                @break
              @case('kaur_laboratorium')
                Selamat datang Kaur Laboratorium!
                @break
              @case('staff_keuangan')
                Selamat datang Staff Keuangan!
                @break
            @endswitch
            <div class="float-right">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#logout">Logout</button>

              <!-- Modal -->
              <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin akan logout?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @yield('konten');
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('js') }}/jquery.min.js"></script>
  <script src="{{ asset('js') }}/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js') }}/js.cookie.js"></script>
  <script src="{{ asset('js') }}/jquery.scrollbar.min.js"></script>
  <script src="{{ asset('js') }}/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="{{ asset('js') }}/Chart.min.js"></script>
  <script src="{{ asset('js') }}/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="{{ asset('js') }}/argon.js?v=1.2.0"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
  <script>
    $(document).ready( function () {
      $('#myTable').DataTable();

      $('.mySelect2').select2();
      
      var rupiah = document.getElementById('rupiah');
      rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
      });
      
      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		      = number_string.split(','),
        sisa     		      = split[0].length % 3,
        rupiah     		    = split[0].substr(0, sisa),
        ribuan     		    = split[0].substr(sisa).match(/\d{3}/gi);
        
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah    += separator + ribuan.join('.');
        }
        
        rupiah  = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
    });
    
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }

    // Bar Chart Example
    var ctx     = document.getElementById("myBarChart");
    var bulan   = [];
    var jumlah  = [];
    <?php
      if (isset($data_pengadaan)) {
        foreach ($data_pengadaan as $key => $value) { ?>
          bulan.push('<?= $key; ?>');
          jumlah.push('<?= $value; ?>');
        <?php } ?>
        var myBarChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: bulan,
            datasets: [{
              label: "Revenue",
              backgroundColor: "#4e73df",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#4e73df",
              data: jumlah,
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'month'
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                maxBarThickness: 25,
                scaleLabel: {
                  display: true,
                  labelString: 'Tahun'
                },
              }],
              yAxes: [{
                display: true,
                scaleLabel: {
                  display: true,
                  labelString: 'Total Biaya Pengadaan'
                },
                ticks: {
                  callback: function(label, index, labels) {
                    return 'Rp. ' + number_format(label);
                  }
                },
              }]
            },
            legend: {
              display: false
            },
            tooltips: {
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
              callbacks: {
                label: function(tooltipItem, chart) {
                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                  return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel);
                }
              }
            },
          }
        });
      <?php }
    ?>


    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    <?php
      if ($institusi && $laboratorium) { ?>
        var pieChartCanvas  = $("#pieChart").get(0).getContext("2d");
        var pieData         = {
          labels: ["Institusi", "Laboratorium"],
          datasets: [
            {
              data: [<?= $institusi; ?>, <?= $laboratorium; ?>],
              backgroundColor: [
                "#f56954",
                "#00a65a",
              ],
            },
          ],
        };
        var pieOptions = {
          maintainAspectRatio: false,
          responsive: true,
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
          type: "pie",
          data: pieData,
          options: pieOptions,
        });
      <?php }
    ?>
    

    function isiAsalBarang(data) {
      $.ajax({
        url   : '/aset/asal_barang',
        type  : 'post',
        data  : {
          _token  : "{{ csrf_token() }}",
          id_aset : data.value
        }, 
        success : function(result){
          $('#asal_barang').val(result.lokasi);
        }
      });
    }
  </script>
</body>

</html>
