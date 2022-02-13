@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <div class="content-header" style="margin-bottom:40px">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail pengguna</h1>
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
    <form method="POST" action="/userupdate/{{$user->id}}" role="form" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
        <!-- <div class="modal-body"> -->
        <div class="col-md-9 " style="margin:0 auto">
          <div class="card card-primary">
              <div class="card-header" style="margin-bottom:30px">
                <h3 class="card-title">Perbarui data pengguna</h3>
              </div>
              <div class="col-md-11" style="margin:0 auto">
            <input type="hidden" name="id" value="{{$user->id}}">

                <div class="form-group">
                    <label >Nama</label>
                    <input type="text" class="form-control"  value="{{ old('name',$user->name) }}" name="name">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control"  value="{{ old('email',$user->email) }}" name="email">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="form-group">
                    <label >Telepon</label>
                    <input type="text" class="form-control"  value="{{ old('telepon',$user->telepon) }}" name="telepon">
                    <span class="text-danger">{{ $errors->first('telepon') }}</span>
                </div>

                <div class="form-group">
                    <label >NIK</label>
                    <input type="text" class="form-control"  value="{{ old('nik',$user->nik) }}" name="nik">
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                </div>

                
                <div class="form-group">
                    <label >Ktp</label>
                    <br></br>
                    <img src="/storage/ktp/{{$user->ktp}}" alt="error" style="width:302px;height:202px;">
                </div>
                <div class="form-group">
                          <label for="exampleInputFile">Ubah Foto KTP</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile" name="ktp">
                              <label class="custom-file-label" for="exampleInputFile">Pilih Foto KTP</label>
                            </div>
                          </div>
                        </div>
                      </div>
                
            
                     <div class="modal-footer">
                  <a href="/user" type="button" class="btn btn btn-secondary">Tutup</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>    
      <!-- </div>  -->
         
    </form>  
                 
</div>
  
  @endsection