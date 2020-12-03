<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function React\Promise\all;

class Invoice extends Controller
{
    public function lihat(){
        $invoices = \App\Models\invoice::all();
        return view('invoice.lihat',compact('invoices'));
    }

    public function detailinvoice($idinvoice){
        $invoice = \App\Models\invoice::where('id_invoice',$idinvoice)->first();
        $pengirimans  = $invoice->pengiriman;
        $berat = $harga = 0;
        foreach ($pengirimans as $pengiriman){
            $berat = $berat + $pengiriman->berat;
            $harga = $harga + $pengiriman->harga;
        }
        return view('invoice.detail',compact(['pengirimans','berat','harga','invoice']));
    }
}
