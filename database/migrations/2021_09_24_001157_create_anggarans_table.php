<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaransTable extends Migration
{
  
  public function up()
  {
    Schema::create('anggaran', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('anggaran_pengadaan');
      $table->bigInteger('anggaran_maintenance');
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
        Schema::dropIfExists('anggaran');
    }
}
