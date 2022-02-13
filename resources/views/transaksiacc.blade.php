@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" style="margin-bottom:40px">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Pembayaran</h1>
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

    <form method="POST" action="/acc/{{$transaksi->id}}" role="form" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="col-md-9 " style="margin:0 auto">
          <div class="card card-primary">
              <div class="card-header" style="margin-bottom:30px">
                <h3 class="card-title">Verifikasi data pembayaran</h3>
                <a href="javascript: history.back()"  class="close" type="button">×<a>
              </div>
              <div class="col-md-11" style="margin:0 auto">
            
            <input type="hidden" name="id" value="{{$transaksi->id}}">

                <div class="form-group">
                    <label >Kode transaksi</label>
                    <input type="text" class="form-control"  value="{{ $transaksi->kode_tran }}" name="kode_tran" disabled>
                </div>
                <div class="form-group">
                    <label >Total Bayar</label>
                    <input type="text" class="form-control"  value="{{ "Rp.".number_format($transaksi->total_harga) }}" name="kode_tran" disabled>
                </div>
                <div class="form-group">
                    <label >Rekening</label>
                    <input type="text" class="form-control"  value="{{ $transaksi->transfer }}" name="kode_tran" disabled>
                </div>
                <div class="form-group">
                    <label >Bukti Transfer</label>
                    <br></br>
                    <img src="/storage/bukti/{{$transaksi->bukti_tf}}" alt="error" style="width:202px;height:202px;">
                </div>


            <div class="modal-footer">
                <a onclick="return confirm('Yakin untuk mengubah data transaksi?')" href="/gagal/{{$transaksi->id}}" type="button" class="btn btn btn-danger">Gagal</a>
                <button onclick="return confirm('Yakin untuk mengubah data transaksi?')" type="submit" class="btn btn-success">Terima</button>
            </div>
        </div>    

                    
    </form>                    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      </div>
      
      </section>
      <!-- /.content -->
    </div>
</div>
  
  @endsection