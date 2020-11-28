<?php

namespace App\Http\Controllers;

use App\Tables\PengirimanTable;
use Illuminate\Http\Request;

class Pengiriman extends Controller
{
    public function baru(){
        return view('pengiriman.baru');
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
            return redirect('pengiriman/lihat')->with('pesan','Data berhasil disimpan!');
        }
        else{
            return redirect('pengiriman/lihat')->with('pesan','Data gagal disimpan');
        }
    }

    public function lihat(){
        $table = (new PengirimanTable())->setup();
        return view('pengiriman.lihat',compact('table'));
    }

    public function edit(){
        $pengiriman = \App\Models\pengiriman::whereNoResi(array_key_first($_GET))->first();
        return view('pengiriman.edit',compact('pengiriman'));
    }

    public function show(){
        $pengiriman = \App\Models\pengiriman::whereNoResi(array_key_first($_GET))->first();
        return view('pengiriman.detail',compact('pengiriman'));
    }

    public function editaction(Request $req){
        $input = $req->all();
        $pengiriman = \App\Models\pengiriman::find($input['no_resi']);
        $pengiriman->nama_penerima = $input['nama_penerima'];
        $pengiriman->nama_pengirim = $input['nama_pengirim'];
        $pengiriman->no_telp_pengirim = $input['no_telp_pengirim'];
        $pengiriman->no_telp_penerima = $input['no_telp_penerima'];
        $pengiriman->tgl_masuk = $input['tgl_masuk'];
        $pengiriman->deskripsi = $input['deskripsi'];
        $pengiriman->berat = $input['berat'];
        $pengiriman->harga = $input['harga'];

        if($pengiriman->save()){
            return redirect('pengiriman/lihat')->with('pesan','Data berhasil diedit!');
        }
        else{
            return redirect('pengiriman/lihat')->with('pesan','Data gagal diedit');
        }
    }

    public function hapusaction(){
        $pengiriman = \App\Models\pengiriman::whereNoResi(array_key_first($_GET))->first();
        try {
            $pengiriman->delete();
            return redirect('pengiriman/lihat')->with('pesan','Data Berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('pengiriman/lihat')->with('pesan','Data gagal dihapus! Pesan :'.$e->getMessage());
        }
    }
}
