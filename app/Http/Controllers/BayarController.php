<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Mobil;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bayar['listBayar'] = Transaksi::where('cancel',0)->where('status_tr',0)->where(function($q){
            $q->where('status_bayar',1); 
        })->get();
        $gagal['list'] = Transaksi::where('cancel',0)->where('status_tr',0)->where(function($q){
            $q->where('status_bayar',3)->orwhere('status_bayar',0); 
        })->get();
        
        return view('pembayaran')->with($bayar)->with($gagal);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    public function acc($id){
        $transaksi = Transaksi::find($id);
        $mobil = Mobil::find($transaksi->mobil_id);
        $transaksi->status_bayar = 2;
        $mobil->status = 1;
        $mobil->save();
        $transaksi->save();
        return redirect('pembayaran')->with('alert','Berhasil mengubah status pembayaran');
    }

    public function gagal($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status_bayar = 3;
        $transaksi->save();
        return redirect('pembayaran')->with('alert','Berhasil mengubah status pembayaran');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
