<?php

namespace App\Http\Controllers\KaurLaboratorium;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KaurLaboratoriumController extends Controller
{

  public function index()
  {
    return view('kaur_laboratorium/dashboard');
  }
}
