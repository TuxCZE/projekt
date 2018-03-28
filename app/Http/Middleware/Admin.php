<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class Admin
{
  public function handle($request, Closure $next)
  {
    $email = $request->session()->get('email');
    
    $prava = DB::table('uzivatele')->where('Email', "=" , $email)->pluck('Prava')[0];
  
    if ($prava < 3) {
      return redirect('/');
    }

    return $next($request);
  }
}
