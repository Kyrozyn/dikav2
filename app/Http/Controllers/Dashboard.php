<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index()
    {
        $pengirimans = DB::Select("Select count(`tgl_masuk`) as `jumlah`, `tgl_masuk` as `tgl_masuk` from pengirimen group by `tgl_masuk` ORDER BY `pengirimen`.`tgl_masuk` DESC LIMIT 10") ;
        $pengirimans_pending = DB::Select("Select
     count(`tgl_masuk`) as `jumlah`,
     `tgl_masuk` as `tgl_masuk`
from
     pengirimen

WHERE `status` = 'Pending'
group by
     `tgl_masuk`
ORDER BY `pengirimen`.`tgl_masuk` DESC
     LIMIT 10") ;
        $pengirimans_terkirim = DB::Select("Select
     count(`tgl_masuk`) as `jumlah`,
     `tgl_masuk` as `tgl_masuk`
from
     pengirimen

WHERE `status` = 'Terkirim'
group by
     `tgl_masuk`
ORDER BY `pengirimen`.`tgl_masuk` DESC
     LIMIT 10") ;
//        dd($pengirimans);
        return view('dashboard', compact('pengirimans','pengirimans_pending','pengirimans_terkirim'));
    }
}
