<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Wadek
{
  
  public function handle(Request $request, Closure $next)
  {
    if (auth()->user()->role !== 'wadek') {
      abort(404);
    }

    return $next($request);
  }
}
