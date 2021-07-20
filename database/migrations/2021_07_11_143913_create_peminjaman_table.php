<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
  
  public function up()
  {
    Schema::create('peminjaman', function (Blueprint $table) {
      $table->id();
      $table->string('aset_id');
      $table->string('peminjam');
      $table->string('lokasi_peminjaman');
      $table->date('tanggal_peminjaman');
      $table->date('tanggal_kembali');
      $table->string('waktu_peminjaman');
      $table->string('nip');
      $table->string('email');
      $table->string('no_telepon');
      $table->timestamps();
    });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
