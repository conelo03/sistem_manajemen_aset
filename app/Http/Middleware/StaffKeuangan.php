<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaffKeuangan
{
  
  public function handle(Request $request, Closure $next)
  {
    if (auth()->user()->role !== 'staff_keuangan') {
      abort(404);
    }

    return $next($request);
  }
}
