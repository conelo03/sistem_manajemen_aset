<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTablePengadaanDanMitra extends Migration
{
  public function up()
  {
    Schema::create('mitras', function (Blueprint $table) {
      $table->id();
      $table->string('kode_mitra');
      $table->string('nama_mitra');
      $table->string('alamat');
      $table->string('kontak');
      $table->timestamps();
    });

    Schema::create('pengadaans', function (Blueprint $table) {
      $table->id();
      $table->string('no_pengadaan');
      $table->date('tanggal_input');
      $table->string('aset_id');
      $table->bigInteger('quantity');
      $table->string('mitra');
      $table->bigInteger('harga_aset');
      $table->string('status')->nullable();
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
        //
    }
}
