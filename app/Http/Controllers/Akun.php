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
            return redirect('/pengiriman/lihatv2');
        }
    }

    function logout(Request $request){
        $request->session()->flush();
        return redirect('/akun/login');
    }
}

