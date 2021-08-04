<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
  
  public function handle(Request $request, Closure $next, ...$guards)
  {
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
      if (Auth::guard($guard)->check()) {
        switch (auth()->user()->role) {
          case 'admin':
            return redirect('admin');
            break;
  
          case 'laboran':
            return redirect('laboran');
            break;
  
          case 'keuangan':
            return redirect('keuangan');
            break;
  
          case 'wadek':
            return redirect('wadek');
            break;
  
          case 'kaur_laboratorium':
            return redirect('kaur_laboratorium');
            break;
  
          case 'staff_keuangan':
            return redirect('staff_keuangan');
            break;
          
          default:
            # code...
            break;
        }
      }
    }

    return $next($request);
  }
}
