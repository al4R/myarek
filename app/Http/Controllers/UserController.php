<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user['listUser'] = User::all();
        return view('user')->with($user);
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
        $user = User::find($id);
        return view('userupdate')->with('user',$user);
    }

    public function showacc($id)
    {
        $user = User::find($id);
        return view('useracc')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return redirect('user')->with('alert','Berhasil mengubah status pengguna');

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
        $user = User::find($id);
        $request->validate(['name' => 'required',
        'email' => 'required|unique:users,email,'.$user->id,
        'telepon' => 'required|unique:users,telepon,'.$user->id,
        'nik' => 'required|unique:users,nik,'.$user->id
    ],[
        'name.required' => 'nama tidak boleh kosong',
        'email.required' => 'email tidak boleh kosong',
        'telepon.required' => 'telepon tidak boleh kosong',
        'nik.required' => 'NIK tidak boleh kosong',
        'email.unique' => 'email tidak boleh sama',
        'telepon.unique' => 'telepon tidak boleh sama',
        'nik.unique' => 'NIK tidak boleh sama'
    ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telepon = $request->input('telepon');
        $user->nik = $request->input('nik');
        if($request->hasfile('ktp')) {
            $file = $request->file('ktp');
            $ext = $file->getClientOriginalName();
            $fileName = date('mYd').rand(1,10).'_'.$ext;
            $file->storeAs('public/ktp', $fileName);
            $user->ktp=$fileName;
        }
        $user->save();
        return redirect('user')->with('alert','Berhasil mengubah data pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('user')->with('alert','Berhasil menghapus data pengguna');
    }
}
