<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->string('kode_maintenance');
            $table->date('tanggal_maintenance');
            $table->string('aset_id');
            $table->string('mitra_id');
            $table->bigInteger('biaya');
            $table->date('tanggal_selesai');
            $table->string('lokasi');
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
        Schema::dropIfExists('maintenances');
    }
}
