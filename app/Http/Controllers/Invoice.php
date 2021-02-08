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

    public function verifikasi(){
        $invoices = \App\Models\invoice::whereStatus('Pending')->get();
        return view('invoice.lihatverifikasi',compact('invoices'));
    }

    public function terimainvoice($id_invoice){
        $invoice = \App\Models\invoice::whereIdInvoice($id_invoice)->first();
        $invoice->status = "Diterima";
        $invoice->save();
        foreach ($invoice->pengiriman as $pengiriman){
            $pengirimans = \App\Models\pengiriman::whereNoResi($pengiriman->no_resi)->first();
            $pengirimans->status = 'Dikirim';
            $pengirimans->save();
        }
        return redirect('/invoice/verifikasi/')->with('pesan','Invoice berhasil diterima');
    }

    public function tolakinvoice($id_invoice){
        $invoice = \App\Models\invoice::whereIdInvoice($id_invoice)->first();
        $invoice->status = "Ditolak";
        $invoice->save();
        foreach ($invoice->pengiriman as $pengiriman){
            $pengirimans = \App\Models\pengiriman::whereNoResi($pengiriman->no_resi)->first();
            $pengirimans->status = 'Pending';
            $pengirimans->save();
        }
        return redirect('/invoice/verifikasi/')->with('pesan','Invoice berhasil ditolak');
    }

    public function laporaninvoice($id)
    {
        $invoice = \App\Models\invoice::whereIdInvoice($id)->first();
        $kendaraan = \App\Models\kendaraan::whereIdKendaraan($invoice->id_kendaraan)->first();
        return view('laporan.invoice',compact('invoice','kendaraan'));
    }
}
