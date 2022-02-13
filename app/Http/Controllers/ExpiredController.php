<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Mobil;

class ExpiredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expired['listExpired'] = Transaksi::where(function($q){
            $q->where('status_bayar',0)->orWhere('status_bayar',3); 
        })->where('cancel',0)->where('expired_at',"<",now())->with(['mobil'])->get();
        return view('expired')->with($expired);
    }
    public function selesai($id){
        $transaksi = Transaksi::find($id);
        $mobil = Mobil::find($transaksi->mobil_id);
        $transaksi->cancel = 1;
        $mobil->status = 0;
        $mobil->save();
        $transaksi->save();
        return redirect('expired')->with('alert','Berhasil membatalkan transaksi');
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
        //
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
