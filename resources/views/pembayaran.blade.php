@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar pembayaran</h1>
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
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Tabel Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="editdatatable"class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode transaksi</th>
                    <th>Status pembayaran</th>
                    <th>Rekening tujuan</th>
                    <th>No kendaraan</th>
                    <th style="width: 160px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listBayar as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->kode_tran}}</td>
                        @if(($data->status_bayar) == 1)
                        <td>Belum diverifikasi</td>
                        @elseif(($data->status) == 3)
                        <td>Bukti tidak sesuai</td>
                        @else
                        <td>Belum dibayar</td>
                        @endif
                        <td>{{ $data->transfer }}</td>
                        <td>{{ $data->mobil->no_kendaraan}}</td>
                        <td>
                       
                        <a href="/acctransaksi/{{$data->id}}" type="button" class="btn btn btn-success btn-xs" style="width: 50px" >Terima</a>
              
                        <!-- <a href="/gagal/{{$data->id}}" type="button" class="btn btn btn-danger btn-xs">Cancel</a> -->
                        <br></br>

                        <!-- <a href="/selesai/{{$data->id}}" type="button" class="btn btn btn-primary btn-xs">Selesai</a> -->
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
              <!-- /.card-body -->
             <div class="card" style="margin-top: 60px">
            <div class="card-header">
            <h3 class="card-title">Tabel Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="editdatatable"class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode transaksi</th>
                    <th>Status pembayaran</th>
                    <th>Rekening tujuan</th>
                    <th>No kendaraan</th>
                    <th style="width: 160px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->kode_tran}}</td>
                        @if(($data->status_bayar) == 1)
                        <td>Belum diverifikasi</td>
                        @elseif(($data->status_bayar) == 3)
                        <td>Bukti tidak sesuai</td>
                        @else
                        <td>Belum dibayar</td>
                        @endif
                        <td>{{ $data->transfer }}</td>
                        <td>{{ $data->mobil->no_kendaraan}}</td>
                        <td>
                       
                        <!-- <a href="/acctransaksi/{{$data->id}}" type="button" class="btn btn btn-success btn-xs" style="width: 50px" >Terima</a> -->
                        <a href="/detailtransaksi/{{$data->id}}" class="btn btn-primary btn-xs">Detail </a>
                        <!-- <a href="/gagal/{{$data->id}}" type="button" class="btn btn btn-danger btn-xs">Cancel</a> -->
                        <br></br>

                        <!-- <a href="/selesai/{{$data->id}}" type="button" class="btn btn btn-primary btn-xs">Selesai</a> -->
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
      
    </section>
    <!-- /.content -->

@endsection
