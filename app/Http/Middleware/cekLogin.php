<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->exists('username')){
            return redirect('/akun/login')->withErrors(['err'=>'Maaf anda belum login!']);
        }
        return $next($request);
    }
}
