<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pengiriman extends Controller
{
    public function input(){
        return view('pengiriman.baru');
    }
}
