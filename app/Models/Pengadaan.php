<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
  use HasFactory;

  public function mitra()
  {
    return $this->hasOne(Mitra::class, 'id', 'mitra_id');
  }
}
