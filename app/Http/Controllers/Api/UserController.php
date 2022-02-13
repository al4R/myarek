<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index(Request $request){
        // dd($request->all());die();
        $user = User::all();
        return response()->json([
            'success' => 1,
            'message' => 'berhasil',
            'user'    => $user
        ]);
    }
    public function show(){
        // dd($request->all());die();
        $user = Auth::user();
        return response()->json([
            'success' => 1,
            'message' => 'berhasil',
            'user'    => $user
        ]);
    }
    
    public function login(Request $request){
        // dd($request->all());die();
        $user = User::where('email', $request->email)->first();
        $status = User::where('email', $request->email)->where('status',1)->first();
        
        if($user){
            if(password_verify($request->password, $user->password)){
                    if($status){
                    return response()->json([
                        'success' => 1,
                        'message' => 'Selamat datang '.$user->name,
                        'user' => $user
                    ]);
                }
                return $this->error(' Tunggu verifikasi dari admin');
            }
            return $this->error(' Kata sandi salah');
        }
        return $this->error(' Email tidak terdaftar');
    }

    public function register(Request $request){
        
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'telepon' => 'required|unique:users',
            'nik' => 'required|unique:users',
            'password' => 'required|min:8',
            ],[
                'email.unique' => 'email tidak boleh sama',
                'telepon.unique' => 'telepon tidak boleh sama',
                'nik.unique' => 'NIK tidak boleh sama'
            ]);
    
            if($validasi->fails()){
                $val = $validasi->errors()->all();
                return $this->error($val[0]);
            }
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->telepon = $request->input('telepon');
        $user->nik = $request->input('nik');
        if($request->hasfile('ktp')) {
            $file = $request->file('ktp');
            $ext = $file->getClientOriginalName();
            $fileName = date('mYd').rand(1,10).'_'.$ext;
            $file->storeAs('public/ktp', $fileName);
            $user->ktp=$fileName;
        } else {
            return $request;
            $user->ktp = '';
        }
        $user->save();    
        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat datang '.$user->name,
                'user'    => $user
            ]);            
        }

        return $this->error('gagal');
    }
    
    public function update(Request $request,$id){
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telepon = $request->input('telepon');

        $user->save();
        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat datang '.$user->name,
                'user'    => $user
            ]);            
        }

        return $this->error('gagal');

    }
    public function updateImg(Request $request,$id){

        $user = User::find($id);
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $fileName = date('mYd').rand(1,10).'_'.$ext;
            $file->storeAs('public/image', $fileName);
            $user->image=$fileName;
        } else {
            return $request;
            $user->image = '';
        }
        $user->save();    
        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat datang '.$user->name,
                'user'    => $user
            ]);            
        }

        return $this->error('gagal');
    }
   
    public function updatePass(Request $request,$id){
        $user = User::find($id);
        if(password_verify($request->password, $user->password)){
            $user->password = bcrypt($request->input('new_password'));
            $user->save();    
            return response()->json([
                'success' => 1,
                'message' => 'Selamat datang '.$user->name,
                'user'    => $user
            ]); 
        }
        return $this->error('Kata sandi salah');
    }

    public function lupapassword(Request $request){
        $user = User::where('email', $request->email)->first();
        $nik = User::where('nik', $request->nik)->first();
      
        
        if($user){
            if($nik){
                return response()->json([
                    'success' => 1,
                    'message' => 'Berhasil dicocokan ',
                    'user' => $nik
                ]);
            }
            return $this->error('NIK salah');
        }
        return $this->error('Email tidak terdaftar');
    }

    public function resetpassword(Request $request,$id){
        $user = User::find($id);
        $user->password = bcrypt($request->input('password'));
        $user->save();    
        return response()->json([
            'success' => 1,
            'message' => 'Berhasil mereset kata sandi',
            'user'    => $user
        ]);

    }

    public function error($pesan){
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }

}
