<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asets', function (Blueprint $table) {
          $table->id();
          $table->string('nama_aset');
          $table->string('jenis_aset');
          $table->string('kepemilikan');
          $table->string('lokasi');
          $table->date('tanggal_pembelian');
          $table->date('tanggal_maintenance');
          $table->string('waktu_maintenance');
          $table->string('kondisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asets');
    }
}
