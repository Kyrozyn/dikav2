<?php

namespace App\Http\Controllers;

use App\Tables\PengirimanTable;
use Illuminate\Http\Request;

class Pengiriman extends Controller
{
    public function baru(Request $req){
        $post = $req->post();
        return view('pengiriman.baru',compact('post'));
    }

    public function baruaction(Request $req){
        $input = $req->all();
        $pengiriman = new \App\Models\pengiriman();
        $pengiriman->no_resi = $input['no_resi'];
        $pengiriman->nama_penerima = $input['nama_penerima'];
        $pengiriman->nama_pengirim = $input['nama_pengirim'];
        $pengiriman->no_telp_pengirim = $input['no_telp_pengirim'];
        $pengiriman->no_telp_penerima = $input['no_telp_penerima'];
        $pengiriman->tgl_masuk = $input['tgl_masuk'];
        $pengiriman->deskripsi = $input['deskripsi'];
        $pengiriman->berat = $input['berat'];
        $pengiriman->harga = $input['harga'];

        if($pengiriman->save()){
            return redirect('pengiriman/input')->with('pesan','Data berhasil disimpan!');
        }
        else{
            return redirect('pengiriman/input')->with('pesan','Data gagal disimpan');
        }
    }

    public function lihat(){
        $table = (new PengirimanTable())->setup();
        return view('pengiriman.lihat',compact('table'));
    }
}
