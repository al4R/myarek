<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Mobil;
use App\Transaksi;
use App\DetailTransaksi;

class TransaksiController extends Controller
{
    public function store(Request $request,$id){
        $mobil = Mobil::find($id);
        if($mobil->status != 0){
            return $this->error(' Mobil telah dipinjam');
        }
        $validasi = Validator::make($request->all(), [
        'user_id' => 'required',
        'mobil_id' => 'required'
        ],[
            'user_id.required' => 'user tidak boleh kosong',
            'mobil_id.required' => 'mobil tidak boleh kosong'
        ]);
        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }
        $kode_tran = "KD/TRN-".now()->format('ymdh')."/".rand(100,999);
        $tgl_order = now();
        $expired_at = now()->addHour();
        $dataTransaksi = array_merge($request->all(),[
            'kode_tran' => $kode_tran,
            'expired_at' => $expired_at,
            'tgl_order' => $tgl_order 
        ]);
        \DB::beginTransaction();
        $transaksi = Transaksi::create($dataTransaksi);
         if(!empty($transaksi)){
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'pesan' => collect($transaksi)
            ]);
        }
        else{
            \DB::rollback();
            $this->error('gagal');
        }
    }   
    
    public function history($id){
        $transaksis = Transaksi::where('cancel','=',0)->where('status_tr','=',1)->with(['user'])->with(['mobil'])->whereHas('user',function ($query) use ($id){
            $query->whereId($id);
        })->get();
        if(!empty($transaksis) ){
            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksi' => collect($transaksis)
            ]);
        }else{
            $this->error('gagal');
        }

    }
    public function berjalan($id){
        $transaksis = Transaksi::where('cancel',0)->where('status_tr',0)->with(['user'])->with(['mobil'])->whereHas('user',function ($query) use ($id){
            $query->whereId($id);
        })->get();
        if(!empty($transaksis) ){
            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksi' => collect($transaksis)
            ]);
        }else{
            $this->error('gagal');
        }

    }
    public function upload(Request $request,$id){

        $transaksi = Transaksi::find($id);
        if($request->hasfile('bukti_tf')) {
            $file = $request->file('bukti_tf');
            $ext = $file->getClientOriginalName();
            $fileName = date('mYd').rand(1,10).'_'.$ext;
            $file->storeAs('public/bukti', $fileName);
            $transaksi->bukti_tf=$fileName;
            $transaksi->status_bayar = 1;
        } else {
            return $request;
            $transaksi->bukti_tf = '';
        }
        $transaksi->save();    
        if($transaksi){
            return response()->json([
                'success' => 1,
                'message' => 'Berhasil'.$transaksi->bukti_tf,
                'upload'  => $transaksi
            ]);            
        }

        return $this->error('gagal');
    }

    public function cancel(Request $request,$id){
        $transaksi = Transaksi::find($id);

        $transaksi->cancel = $request->input('cancel');
        $transaksi->save();
        if($transaksi)
       { 
           return response()->json([
            'success' => 1,
            'message' => 'berhasil',
            'cancel'    => $transaksi
        ]);
        }else{
            return $this->error('gagal');
        }
    }
   
    public function error($pesan){
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
