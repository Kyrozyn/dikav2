<?php

namespace App\Http\Controllers;

use App\Tables\PengirimanTable;
use Illuminate\Http\Request;

class Pengiriman extends Controller
{
    public function baru(){
        $count = \App\Models\pengiriman::all()->count() + 1;
        return view('pengiriman.baru', compact('count'));
    }

    public function baruaction(Request $req){
        $input = $req->all();
        $pengiriman = new \App\Models\pengiriman();
        $pengiriman->no_resi = $input['no_resi'];
        $pengiriman->nama_penerima = $input['nama_penerima'];
        $pengiriman->nama_pengirim = $input['nama_pengirim'];
        $pengiriman->alamat = $input['alamat'];
        $pengiriman->no_telp_pengirim = $input['no_telp_pengirim'];
        $pengiriman->no_telp_penerima = $input['no_telp_penerima'];
        $pengiriman->tgl_masuk = $input['tgl_masuk'];
        $pengiriman->deskripsi = $input['deskripsi'];
        $pengiriman->berat = $input['berat'];
        $pengiriman->lebar = $input['lebar'];
        $pengiriman->panjang = $input['panjang'];
        $pengiriman->tinggi = $input['tinggi'];
        $pengiriman->harga = $input['harga'];
        $pengiriman->status = $input['status'];

        if($pengiriman->save()){
            return redirect('pengiriman/lihatv2')->with('pesan','Data berhasil disimpan!');
        }
        else{
            return redirect('pengiriman/lihatv2')->with('pesan','Data gagal disimpan');
        }
    }

    public function lihat(){
        $table = (new PengirimanTable())->setup();
        return view('pengiriman.lihat',compact('table'));
    }

    public function lihatv2(){
        $pengirimans = \App\Models\pengiriman::all();
        return view('pengiriman.lihatv2',compact('pengirimans'));
    }

    public function lihatv2pending(){
        $pengirimans = \App\Models\pengiriman::where('status','=','Pending')->get();
        return view('pengiriman.lihatv2pending',compact('pengirimans'));
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
        $pengiriman->alamat = $input['alamat'];
        $pengiriman->no_telp_pengirim = $input['no_telp_pengirim'];
        $pengiriman->no_telp_penerima = $input['no_telp_penerima'];
        $pengiriman->tgl_masuk = $input['tgl_masuk'];
        $pengiriman->deskripsi = $input['deskripsi'];
        $pengiriman->berat = $input['berat'];
        $pengiriman->lebar = $input['lebar'];
        $pengiriman->panjang = $input['panjang'];
        $pengiriman->tinggi = $input['tinggi'];
        $pengiriman->harga = $input['harga'];
        $pengiriman->status = $input['status'];

        if($pengiriman->save()){
            return redirect('pengiriman/lihatv2')->with('pesan','Data berhasil diedit!');
        }
        else{
            return redirect('pengiriman/lihatv2')->with('pesan','Data gagal diedit');
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

    public function cetakresi($noresi)
    {
        $pengiriman = \App\Models\pengiriman::whereNoResi($noresi)->first();
        return view('laporan.resi',compact('pengiriman'));
    }

    public function laporan(Request $request)
    {
        $tanggal_awal = $request->post('tanggal_awal');
        $tanggal_akhir = $request->post('tanggal_akhir');
        $pengirimans = \App\Models\pengiriman::all()->whereBetween('tgl_masuk',[$tanggal_awal,$tanggal_akhir]);
        return view('laporan.pengiriman',compact('pengirimans','tanggal_akhir','tanggal_awal'));
    }

    public function laporankirim()
    {
        return view('laporan.laporanpengiriman');
    }
}
