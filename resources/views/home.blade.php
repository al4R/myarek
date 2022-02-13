@extends('layouts.admin')
<!-- Google Font: Source Sans Pro -->

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Beranda</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$CountUser}}</h3>

                <p>Jumlah pengguna</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('user.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-lightblue">
              <div class="inner">
                <h3>{{$CountMobil}}</h3>

                <p>Jumlah mobil</p>
              </div>
              <div class="icon">
                <i class="ion ion-model-s"></i>
              </div>
              <a href="{{ route('mobil.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3>{{$CountRiwayat}}</h3>

                <p>Transaksi berhasil</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-graph-up-left"></i>
              </div>
              <a href="{{ route('riwayat.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger disabled color-palette">
              <div class="inner">
                <h3>{{$CountCancel}}</h3>

                <p>Transaksi gagal</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-graph-down-left"></i>
              </div>
              <a href="{{ route('cancel.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>        
        <div class="row">
        <div class="col-lg-6 col-6">
            <!-- AREA CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Total penghasilan : Rp.<?php echo json_encode($laba); ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
        </div> 
        <div class="col-lg-6 col-6">
            <!-- AREA CHART -->
            <div class="card card-lightblue">
              <div class="card-header">
                <h3 class="card-title">Mobil yang sering dipinjam </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
        </div> 
      </div><!-- /.container-fluid -->
      </section> 
</div>   
@endsection

@push('scripts')
<!-- FLOT CHARTS -->
<script src="{{ asset('plugins/flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->


    <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : <?php echo json_encode ($label); ?>,
      datasets: [
        {
          label               : 'Penghasilan bulan ini ',
          backgroundColor     : 'rgb(23,162,184)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($jumlah_transactions); ?>
        },
      ]
    }
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, {
      type: 'bar',
      data: areaChartData,
      options: areaChartOptions
    })
// This will get the first returned node in the jQuery collection.

  })
</script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart2').get(0).getContext('2d')
    var q = <?php echo json_encode($Label2); ?>;
    q.push({"id":0,"model":""});
    var data = q.map(function(item){
      return item['model'];
    });
    var jml = <?php echo json_encode($Label3); ?>;
    jml.push({"mobil_id":0,"jml":0})
    var jumlah = jml.map(function(item){
      return item['jml'];
    });
var areaChartData = {
  
  labels  : data,
  datasets: [
    {
      label               : 'Dipinjam sebanyak ',
      backgroundColor     : 'rgba(60,141,188,0.9)',
      borderColor         : 'rgba(60,141,188,0.8)',
      pointRadius          : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : jumlah
    },
  ]
}
var areaChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
    display: false
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : false,
      }
    }],
    yAxes: [{
      gridLines : {
        display : false,
      }
    }]
  }
}

// This will get the first returned node in the jQuery collection.
var areaChart       = new Chart(areaChartCanvas, {
  type: 'bar',
  data: areaChartData,
  options: areaChartOptions
})
  })
</script>
@endpush


