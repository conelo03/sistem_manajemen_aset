<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Keuangan
{
  
  public function handle(Request $request, Closure $next)
  {
    if (auth()->user()->role !== 'keuangan') {
      abort(404);
    }

    return $next($request);
  }
}
