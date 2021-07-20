<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KaurLaboratorium
{
  
  public function handle(Request $request, Closure $next)
  {
    if (auth()->user()->role !== 'kaur_laboratorium') {
      abort(404);
    }

    return $next($request);
  }
}
