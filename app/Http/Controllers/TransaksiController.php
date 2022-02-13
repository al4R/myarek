<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Mobil;

class TransaksiController extends Controller
{
    public function index(){

        $transaksi['listTransaksi'] = Transaksi::where('status_bayar',2)->where('cancel',0)->where('status_tr',0)->get();
        return view('transaksi')->with($transaksi);
    }
    // public function cancel($id){
    //     $transaksi = Transaksi::find($id);
    //     $mobil = Mobil::find($transaksi->mobil_id);
    //     $transaksi->cancel = 1;
    //     $mobil->status =0;
    //     $mobil->save();
    //     $transaksi->save();
    //     return redirect('transaksi');
    // }

    public function selesai($id){
        $transaksi = Transaksi::find($id);
        $mobil = Mobil::find($transaksi->mobil_id);
        $transaksi->status_tr = 1;
        $mobil->status =0;
        $mobil->save();
        $transaksi->save();
        return redirect('transaksi')->with('alert','Berhasil mengubah data transaksi');
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksiacc')->with('transaksi',$transaksi);
    }

    public function detail($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksidetail')->with('transaksi',$transaksi);
    }
}
