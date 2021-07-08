<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class is_admin
{
  
  public function handle(Request $request, Closure $next)
  {
    if (auth()->user()->role !== 'admin') {
      abort(404);
    }
    
    return $next($request);
  }
}
