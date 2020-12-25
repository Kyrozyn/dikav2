<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->integer('id_kendaraan')->autoIncrement();
            $table->string('nama_kendaraan');
            $table->integer('kapasitas');
            $table->integer('lebar');
            $table->integer('panjang');
            $table->integer('tinggi');
//            $table->integer('prioritas');
            $table->string('plat_kendaraan');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
