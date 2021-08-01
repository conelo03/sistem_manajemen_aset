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
      $table->string('asal_barang');
      $table->string('nip');
      $table->string('email');
      $table->string('no_telepon');
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
        Schema::dropIfExists('peminjaman');
    }
}
