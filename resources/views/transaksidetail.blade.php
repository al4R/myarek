@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" style="margin-bottom:40px">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail transaksi</h1>
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

    <form method="POST" action="/detail/{{$transaksi->id}}" role="form" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="col-md-9 " style="margin:0 auto">
            <div class="card card-primary">
              <div class="card-header" style="margin-bottom:30px">
                <h3 class="card-title">Detail data transaksi</h3>
              </div>
              <div class="col-md-11" style="margin:0 auto">
            <input type="hidden" name="id" value="{{$transaksi->id}}">

                <div class="form-group">
                    <label >Kode transaksi</label>
                    <input type="text" class="form-control"  value="{{ $transaksi->kode_tran }}" name="kode_tran" disabled>
                </div>
                <div class="form-group">
                    <label >Tanggal pesan</label>
                    <input type="text" class="form-control"  value="{{ $transaksi->tgl_order }}"  disabled>
                </div>
                <div class="form-group">
                    <label >Total Bayar</label>
                    <input type="text" class="form-control"  value="{{ "Rp.".number_format($transaksi->total_harga) }}"  disabled>
                </div>
                <div class="form-group">
                    <label >Rekening</label>
                    <input type="text" class="form-control"  value="{{ $transaksi->transfer }}"  disabled>
                </div>
                <div class="form-group">
                    <label >Bukti Transfer</label>
                    <br></br>
                    <img src="/storage/bukti/{{$transaksi->bukti_tf}}" alt="error" style="width:300px;height:300px;">
                </div>
                <div class="form-group">
                    <label >Status Pembayaran</label>
                    <input type="text" class="form-control"
                    @if(($transaksi->status_bayar)==2)
                    value="Sudah dibayar"
                    @elseif(($transaksi->status_bayar)==3)
                    value="Bukti pembayaran tidak sesuai"
                    @elseif(($transaksi->status_bayar)==0)
                    value="Belum dibayar"
                    @endif
                    disabled>
                </div>
                <div class="form-group">
                    <label >Status batal</label>
                    <input type="text" class="form-control"  
                    @if(($transaksi->cancel)==0)
                    value="Tidak dibatalkan"
                    @else
                    value="Dibatalkan"
                    @endif
                    disabled>
                </div>
                <div class="form-group">
                    <label >Model mobil</label>
                    <input type="text" class="form-control"  value="{{ $transaksi->mobil->model }}"  disabled>
                </div>
                <div class="form-group">
                    <label >NO mobil</label>
                    <input type="text" class="form-control"  value="{{ $transaksi->mobil->no_kendaraan }}"  disabled>
                </div>
                <div class="form-group">
                    <label >Pemesan</label>
                    <input type="text" class="form-control"  value="{{ $transaksi->user->name }}"  disabled>
                </div>
                <div class="form-group">
                    <label >Nik Pemesan</label>
                    <input type="text" class="form-control"  value="{{ $transaksi->user->nik}}"  disabled>
                </div>


            <div class="modal-footer">
            <a href="javascript: history.back()" type="button" class="btn btn btn-secondary">Tutup</a>
                <!-- <a href="/gagal/{{$transaksi->id}}" type="button" class="btn btn btn-danger">Gagal</a> -->
                <!-- <button type="submit" class="btn btn-success">Acc</button> -->
            </div>
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