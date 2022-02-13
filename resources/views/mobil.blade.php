@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar mobil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Dashboard</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      @if ($message = Session::get('alert'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
      </div>
    @endif
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Tabel Mobil</h3>
            <button type="button" class="btn btn-info float-right " data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus blue"></i> Tambah</button>
           </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="editdatatable"class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Merek</th>
                    <th>Model</th>
                    <th>Harga</th>
                    <th>No Kendaraan</th>
                    <th>Status</th>
                    <th>Kapasitas</th>
                    <th>Transmisi</th>
                    <th style="width: 90px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listMobil as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->merk }}</td>
                        <td>{{ $data->model }}</td>
                        <td>{{ "Rp.".number_format($data->harga) }}</td>
                        <td>{{ $data->no_kendaraan }}</td>
                        @if(($data->status) == 0)
                        <td>ada</td>
                        @elseif(($data->status) == 1)
                        <td>dipinjam</td>
                        @else
                        <td>dipesan</td>
                        @endif
                        
                        <td>{{ $data->kapasitas }} orang</td>
                        <td>{{ $data->transmisi }}</td>
                        <td>
                        <a href="/mobilupdate/{{$data->id}}">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        <!-- /mobilupdate/{{$data->id}} -->
                        /
                        <a onclick="return confirm('Yakin untuk menghapus data?')" href="/mobildelete/{{$data->id}}">
                            <i class="fa fa-trash red"></i>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <!-- modal add -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah data mobil</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    
                    <form method="POST" action="{{ route('mobil.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label >Model</label>
                          <input type="text" class="form-control"  placeholder="Model"  name="model">
                          <span class="text-danger">{{ $errors->first('model') }}</span>
                        </div>
                        <div class="form-group">
                          <label >Merek</label>
                          <input type="text" class="form-control"  placeholder="Merk" name="merk">
                          <span class="text-danger">{{ $errors->first('merk') }}</span>
                        </div>
                        <div class="form-group">
                          <label >Tahun</label>
                          <input type="text" class="form-control"  placeholder="Tahun" name="tahun">
                          <span class="text-danger">{{ $errors->first('tahun') }}</span>
                        </div>

                        <div class="form-group">
                          <label >No Kendaraan</label>
                          <input type="text" class="form-control"  placeholder="No Kendaraan" name="no_kendaraan">
                          <span class="text-danger">{{ $errors->first('no_kendaraan') }}</span>
                        </div>
                        <div class="form-group">
                        <label>Transmisi</label>
                        <select class="form-control" name="transmisi">
                          <option value="Manual">Manual</option>
                          <option value="Automatic">Automatic</option>
                        </select>
                        </div>

                        <div class="form-group">
                          <label >Kapasitas</label>
                          <input type="text" class="form-control"  placeholder="Kapasitas" name="kapasitas">
                          <span class="text-danger">{{ $errors->first('kapasitas') }}</span>
                        </div>
                        <div class="form-group">
                          <label >Harga</label>
                          <input type="text" class="form-control"  placeholder="Harga" name="harga">
                          <span class="text-danger">{{ $errors->first('harga') }}</span>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Gambar mobil</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                              <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div> 
              <!-- end modal add -->
              
            </div>
      
      
      </div>
      
    </section>
    <!-- /.content -->
  </div>
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


<script type="text/javascript">
@if (!$errors->isEmpty())
    $('#exampleModal').modal('show');
@endif
</script>
@endpush