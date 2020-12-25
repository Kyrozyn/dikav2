<?php

namespace App\Http\Controllers;

use App\Tables\KendaraanTable;
use Illuminate\Http\Request;

class Kendaraan extends Controller
{
    public function baru(){
        return view('kendaraan.baru');
    }

    public function baruaction(Request $req){
        $input = $req->all();
        $kendaraan = new \App\Models\kendaraan();
        $kendaraan->nama_kendaraan = $input['nama_kendaraan'];
        $kendaraan->kapasitas = $input['kapasitas'];
        $kendaraan->lebar = $input['lebar'];
        $kendaraan->panjang = $input['panjang'];
        $kendaraan->tinggi = $input['tinggi'];
//        $kendaraan->prioritas = $input['prioritas'];
        $kendaraan->plat_kendaraan = $input['plat_kendaraan'];
        $kendaraan->status = $input['status'];

        if($kendaraan->save()){
            return redirect('kendaraan/lihat')->with('pesan','Data berhasil disimpan!');
        }
        else{
            return redirect('kendaraan/lihat')->with('pesan','Data gagal disimpan');
        }
    }

    public function lihat(){
        $table = (new KendaraanTable())->setup();
        return view('kendaraan.lihat',compact('table'));
    }

    public function edit(){
        $kendaraan = \App\Models\kendaraan::whereIdKendaraan(array_key_first($_GET))->first();
        return view('kendaraan.edit',compact('kendaraan'));
    }

    public function editaction(Request $req){
        $input = $req->all();
        $kendaraan = \App\Models\kendaraan::find($input['id_kendaraan']);
        $kendaraan->nama_kendaraan = $input['nama_kendaraan'];
        $kendaraan->kapasitas = $input['kapasitas'];
        $kendaraan->lebar = $input['lebar'];
        $kendaraan->panjang = $input['panjang'];
        $kendaraan->tinggi = $input['tinggi'];
//        $kendaraan->prioritas = $input['prioritas'];
        $kendaraan->plat_kendaraan = $input['plat_kendaraan'];
        $kendaraan->status = $input['status'];

        if($kendaraan->save()){
            return redirect('kendaraan/lihat')->with('pesan','Data berhasil disimpan!');
        }
        else{
            return redirect('kendaraan/lihat')->with('pesan','Data gagal disimpan');
        }
    }

    public function hapusaction(){
        $kendaraan = \App\Models\kendaraan::find(array_key_first($_GET))->first();
        try {
            $kendaraan->delete();
            return redirect('kendaraan/lihat')->with('pesan','Data Berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('kendaraan/lihat')->with('pesan','Data gagal dihapus! Pesan :'.$e->getMessage());
        }
    }
}

