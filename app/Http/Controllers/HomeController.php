<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mobil;
use App\Transaksi;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user['CountUser'] = User::count();
        $mobil['CountMobil'] = Mobil::count();
        $riwayat['CountRiwayat'] = Transaksi::where('status_tr',1)->where('status_bayar',2)->count();
        $cancel['CountCancel'] = Transaksi::where('cancel',1)->where('status_tr',0)->count();
        $querylaba = collect(DB::select("SELECT sum(total_harga) as penghasilan from transaksis where status_bayar = 2 and status_tr = 1"))->first();
        $laba = $querylaba->penghasilan;
        $label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        for($bulan = 1 ; $bulan < 12; $bulan++){
            $chart = collect(DB::select("SELECT sum(total_harga) as total from transaksis where month(created_at)='$bulan' and status_bayar = 2 and status_tr = 1"))->first();
            $jumlah_transactions[] = (int)$chart->total;
        }
        $label2['Label2'] = collect(DB::select("SELECT id,model from mobils where id in (select mobil_id from transaksis where status_bayar =2 )"))->take(10);
        $chart2['Label3'] = collect(DB::select("SELECT mobil_id,count(mobil_id) as jml from transaksis where status_bayar =2  group by mobil_id"))->take(10);
        return view('home',['label'=>$label,'jumlah_transactions'=>$jumlah_transactions, 'laba'=>$laba])->with($user)->with($mobil)->with($riwayat)->with($cancel)->with($label2)->with($chart2);

    }

}
