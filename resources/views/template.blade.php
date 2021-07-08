<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin</title>
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
              <a class="nav-link" href="/admin/manajemen_user">
                <span class="nav-link-text text-white">Manajemen User</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/data_aset">
                <span class="nav-link-text text-white">Data Aset</span>
              </a>
            </li>
            <li class="nav-item">
              <span class="nav-link">
                <span class="nav-link-text text-white">Pengadaan</span>
              </span>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/pengadaan" class="nav-link">
                    <span class="nav-link-text text-white">Data Pengadaan</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/pengadaan/history" class="nav-link">
                    <span class="nav-link-text text-white">History Pengadaan</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/profile.html">
                <span class="nav-link-text text-white">Maintenance</span>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a class="nav-link" href="#">
                <span class="nav-link-text text-white">Peminjaman</span>
              </a>
            </li>
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
            @endswitch
            <div class="float-right">
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
    });

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
  </script>
</body>

</html>