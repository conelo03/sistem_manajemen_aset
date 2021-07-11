<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
  use HasFactory;

  protected $table  = 'maintenance';

  public function aset()
  {
    return $this->hasOne(Asets::class, 'id', 'aset_id');
  }

  public function mitra()
  {
    return $this->hasOne(Mitra::class, 'id', 'mitra_id');
  }
}
