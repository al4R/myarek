<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merk;

class MerkController extends Controller
{
    public function index()
    {
        $merk['listMerk'] = Merk::all();
        return view('merk')->with($merk);
    }

    public function create(Request $request)
    {
        $merk = new Merk();
        $merk->merk = $request->input('merk');
        $merk->save();
        return redirect('merk');
    }

    public function destroy($id)
    {
        $merk = Merk::find($id);
        $merk->delete();

        return redirect('merk');
    }

    public function update(Request $request, $id)
    {
        $merk = Merk::find($id);
        $merk->merk = $request->input('merk');
        $merk->save();
        return redirect('merk');
    }

}
