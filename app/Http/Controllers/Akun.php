<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Akun extends Controller
{
    public function login(Request $req){
        if($req->session()->exists('username')){
            return redirect('/pengiriman/lihatv2');
        }
        return view('akun/login');
    }

    function loginaction(Request $req){
        $namauser = $req->input('username');
        $katasandi = $req->input('password');
        $akundb = \App\Models\akun::where('username', $namauser)->where('password', $katasandi)->first();
        if($akundb == null){
            return redirect('/akun/login')->withErrors(['err' => 'Nama Akun / Kata Sandi Salah']);
        }
        else{
            $req->session()->put('username', $akundb->username);
            $req->session()->put('role', $akundb->role);
            if($akundb->role == 'Direktur'){
                return redirect('/invoice/verifikasi');
            }
            else{
                return redirect('/pengiriman/lihatv2');
            }

        }
    }

    function logout(Request $request){
        $request->session()->flush();
        return redirect('/akun/login');
    }

    public function baru(){
        return view('akun.baru');
    }

    public function baruaction(Request $req){
        $input = $req->all();
        $akun = new \App\Models\akun();
        $akun->username = $input['username'];
        $akun->password = $input['password'];
        $akun->role = $input['role'];

        if($akun->save()){
            return redirect('akun/lihat')->with('pesan','Data berhasil disimpan!');
        }
        else{
            return redirect('akun/lihat')->with('pesan','Data gagal disimpan');
        }
    }

    public function lihat(){
        $akuns = \App\Models\akun::all();
        return view('akun.lihat',compact('akuns'));
    }

    public function edit(){
        $akun = \App\Models\akun::whereUsername(array_key_first($_GET))->first();
        return view('akun.edit',compact('akun'));
    }

    public function editaction(Request $req){
        $input = $req->all();
        $akun = \App\Models\akun::whereUsername($req['username'])->first();
        $akun->username = $input['username'];
        $akun->password = $input['password'];
        $akun->role = $input['role'];

        if($akun->save()){
            return redirect('akun/lihat')->with('pesan','Data berhasil diedit!');
        }
        else{
            return redirect('akun/lihat')->with('pesan','Data gagal diedit');
        }
    }

    public function hapusaction(){
        $akun = \App\Models\akun::whereUsername(array_key_first($_GET))->first();
        try {
            $akun->delete();
            return redirect('akun/lihat')->with('pesan','Data Berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('akun/lihat')->with('pesan','Data gagal dihapus! Pesan :'.$e->getMessage());
        }
    }
}

