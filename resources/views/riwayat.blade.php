@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Riwayat transaksi</h1>
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

        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Tabel Riwayat</h3>
            <!-- <button type="button" class="btn btn-info float-right " data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus blue"></i> Add</button> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="editdatatable"class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode Transaksi</th>
                    <th>Pemesan</th>
                    <th>No.mobil</th>
                    <th>Status</th>
                    <th style="width:90px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listRiwayat as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->kode_tran}}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->mobil->no_kendaraan }}</td>
                        <td>Selesai</td>
                        <td>
                        <a href="/detailtransaksi/{{$data->id}}" class="btn btn-primary btn-xs">Detail </a>
                        
                        <!-- <a href="/mobildelete/{{$data->id}}">
                            <i class="fa fa-trash red"></i>
                        </a> -->
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
      
      
      </div>
      
    </section>

    
  
</div>

@endsection
