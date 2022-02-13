<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;

class MetodeBayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metode['listMetode'] = Pembayaran::all();
        return view('metodebayar')->with($metode);

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    }
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
       $metode = new Pembayaran();
       $metode->no_rekening = $request->input('no_rekening');
       $metode->metode = $request->input('metode');
            if($request->hasfile('logo')) {
                $file = $request->file('logo');
                $ext = $file->getClientOriginalName();
                $fileName = date('mYd').rand(1,10).'_'.$ext;
                $file->storeAs('public/metode', $fileName);
                $metode->logo=$fileName;
            } else {
                return $request;
                $metode->logo = '';
            }
            $metode->save();

            return redirect('metode');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metode = Pembayaran::find($id);
        return view('metodeupdate')->with('metode',$metode);
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
        $metode = Pembayaran::find($id);
        $metode->no_rekening = $request->input('no_rekening');
        $metode->metode = $request->input('metode');
             if($request->hasfile('logo')) {
                 $file = $request->file('logo');
                 $ext = $file->getClientOriginalName();
                 $fileName = date('mYd').rand(1,10).'_'.$ext;
                 $file->storeAs('public/metode', $fileName);
                 $metode->logo=$fileName;
             }
             $metode->save();
 
             return redirect('metode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Pembayaran::find($id);
        $user->delete();

        return redirect('metode');
    }
}
