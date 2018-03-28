<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class PrihlasenyUzivatel
{
  public function handle($request, Closure $next)
  {
    $email = $request->session()->get('email');
    $hash = $request->session()->get('hash');
    
    $udaje_kontrola = DB::table('uzivatele')->where([['Email', "=" , $email], ['Heslo', "=", $hash]])->count();  
  
    if ($udaje_kontrola < 1) {
      return redirect('/');
    }

    return $next($request);
  }
}
