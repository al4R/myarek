@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar pengguna</h1>
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
            <h3 class="card-title">Tabel Pengguna</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>NIK</th>
                    <th>Verifikasi</th>
                    <th style="width: 40px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listUser as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->telepon }}</td>
                        <td>{{ $data->nik }}</td>
                        @if(($data->status) == 0)
                        <td>Belum </td>
                        @elseif(($data->status == 1))
                        <td>Sudah </td>
                        @endif
                        <td>
                        <a href="/userupdate/{{$data->id}}">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a onclick="return confirm('Yakin untuk menghapus data?')" href="/userdelete/{{$data->id}}">
                            <i class="fa fa-trash red"></i>
                        </a>
                        <a href="/useracc/{{$data->id}}" type="button" class="btn btn btn-success btn-xs" style="width: 50px" >Terima</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
</div>
@endsection
