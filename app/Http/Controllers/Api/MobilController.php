<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mobil;
use Illuminate\Support\Str;

class MobilController extends Controller
{
    public function index(Request $request){
        // dd($request->all());die();
        // with(['merk'])->with(['seri'])->
        $mobil = Mobil::get();
        if(!empty($mobil))
        { 
            return response()->json([
             'success' => 1,
             'message' => 'berhasil',
             'mobil'   => $mobil
         ]);
         }else{
             return $this->error('gagal');
         }
    }

    public function indexpage(Request $request){
        // dd($request->all());die();
        // with(['merk'])->with(['seri'])->
        $mobil = Mobil::paginate(4);
        if(!empty($mobil))
        { 
            return response()->json([
             'success' => 1,
             'message' => 'berhasil',
             'page' =>$mobil
         ]);
         }else{
             return $this->error('gagal');
         }
    }
    
    public function search($q){
        $mobil = Mobil::where('merk','like',"%{$q}%")->orwhere('model','like',"%{$q}%")->orwhere('harga','like',"%{$q}%")->paginate(4);
        if(!empty($mobil))
        { 
            return response()->json([
             'success' => 1,
             'message' => 'berhasil',
             'page' =>$mobil
         ]);
         }else{
             return $this->error('gagal');
         }
    }
    
    public function show($id){
        // dd($request->all());die();
        $mobil = Mobil::find($id);
        if(!empty($mobil))
        { 
            return response()->json([
             'success' => 1,
             'message' => 'berhasil',
             'mobil'   => $mobil
         ]);
         }else{
             return $this->error('gagal');
         }
    }

    public function update(Request $request,$id){
        $mobil = Mobil::find($id);

        $mobil->status = $request->input('status');

        $mobil->save();
       if(!empty($mobil))
       { 
           return response()->json([
            'success' => 1,
            'message' => 'berhasil',
            'update'    => $mobil
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
