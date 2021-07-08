<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class is_laboran
{
  
  public function handle(Request $request, Closure $next)
  {
    if (auth()->user()->role !== 'laboran') {
      abort(404);
    }

    return $next($request);
  }
}
