@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transaksi kadaluarsa</h1>
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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      @if ($message = Session::get('alert'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
      </div>
    @endif
      <div class="container-fluid">

        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Tabel transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="editdatatable"class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode Transaksi</th>
                    <th>Status Bayar</th>
                    <th>Expired</th>
                    <th>Pemesan</th>
                    <th>No kendaraan</th>
                    <th style="width: 160px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listExpired as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->kode_tran}}</td>
                        <td>Belum bayar</td>
                        <td>{{ $data->expired_at}}</td>
                        <td>{{ $data->user->name}}</td>
                        <td>{{ $data->mobil->no_kendaraan }}</td>
                        <td>
                       
                        <!-- <a href="/detailtransaksi/{{$data->id}}" type="button" class="btn btn btn-success btn-xs" >Acc</a>
              /
                        <a href="/trancancel/{{$data->id}}" type="button" class="btn btn btn-danger btn-xs">Cancel</a>
                        <br></br> -->
                        <a href="/detailtransaksi/{{$data->id}}" class="btn btn-primary btn-xs">Detail </a>

                        <a onclick="return confirm('Yakin untuk membatalkan transaksi ?')" href="/expselesai/{{$data->id}}" type="button" class="btn btn btn-success btn-xs">Selesai</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            
      </div>
      
    </section>
    <!-- /.content -->
  </div>
</div>

@endsection

