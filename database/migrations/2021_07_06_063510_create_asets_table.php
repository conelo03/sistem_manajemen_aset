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
        $table->enum('jenis_aset', ['laboratorium', 'institusi']);
        $table->string('merk');
        $table->string('kepemilikan');
        $table->string('lokasi');
        $table->date('tanggal_pembelian');
        $table->date('tanggal_maintenance')->nullable();
        $table->string('waktu_maintenance');
        $table->enum('kondisi', ['baik', 'rusak', 'maintenance']);
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
