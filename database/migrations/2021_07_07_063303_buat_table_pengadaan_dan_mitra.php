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
      $table->string('nama_aset');
      $table->string('jenis_aset');
      $table->string('merk');
      $table->bigInteger('quantity');
      $table->string('mitra_id');
      $table->bigInteger('harga_aset');
      $table->enum('status_kaur', ['tolak', 'terima'])->nullable();
      $table->enum('status_wadek', ['tolak', 'terima'])->nullable();
      $table->enum('status_keuangan', ['tolak', 'terima'])->nullable();
      $table->enum('status', ['tolak', 'terima'])->nullable();
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
