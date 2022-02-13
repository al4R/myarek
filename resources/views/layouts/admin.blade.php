
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <title>AdminLTE 3 | Dashboard 3</title> -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">Web Admin AREK</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <!-- <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div> -->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                CRUD
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> -->
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('mobil.index') }}" class="nav-link">
                  <i class="fas fa-car nav-icon"></i>
                  <p>Mobil</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('transaksi.index') }}" class="nav-link">
                  <i class="fas fa-exchange-alt nav-icon"></i>
                  <p>Transaksi</p>
                  @if( App\Transaksi::tran() == 0 )
                  
                  @else
                  <span class="badge badge-primary right">{{App\Transaksi::tran()}}</span>
                  @endif
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('pembayaran.index') }}" class="nav-link">
                  <i class="fas fa-money-bill-wave nav-icon"></i>
                  <p>Pembayaran</p>
                  @if( App\Transaksi::count() == 0 )
                  
                  @else
                  <span class="badge badge-primary right">{{App\Transaksi::count()}}</span>
                  @endif
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('riwayat.index') }}" class="nav-link">
                  <i class="fas fa-history nav-icon"></i>
                  <p>Riwayat</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('cancel.index') }}" class="nav-link">
                  <i class="fas fa-ban nav-icon"></i>
                  <p>Dibatalkan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('expired.index') }}" class="nav-link">
                  <i class="fas fa-calendar-times nav-icon"></i>
                  <p>Kadaluarsa</p>
                  @if( App\Transaksi::exp() == 0 )
                  
                  @else
                  <span class="badge badge-primary right">{{App\Transaksi::exp()}}</span>
                  @endif
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="{{ route('metode.index') }}" class="nav-link">
                  <i class="fas fa-money-check-alt nav-icon"></i>
                  <p>Metode</p>
                </a>
              </li> -->

            <!-- </ul>   
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 <i class="nav-icon fas fa-power-off"></i>
                <p>Keluar<p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset ('dist/js/adminlte.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset ('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset ('plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset ('dist/js/pages/dashboard3.js') }}"></script>

<!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script> -->

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<!-- <script type="text/javascript">
  $(document).ready(function () {

    var table = $('#editdatatable').Datatable();

    table.on('click','.edit',function(){
      tr = $(this).closest('tr');
      if ($($tr).hasClass('child')) {
        $tr = $tr.prev(.parent);
      }
      var data = table.row($tr).data();
      console.log(data);
      $('#name').val(data[1]);

      $('#editFrom').attr('action','/mobil/'+data[0]);
      $('#editModal').modal('show');
    });

  });
</script> -->
@stack('scripts')
<footer class="main-footer float-right">
    <b>Web Admin Aplikasi Rental Kendaraan</b>
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div> -->
  </footer>
</body>
</html>
