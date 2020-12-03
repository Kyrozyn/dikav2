<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->string('no_resi')->primary();
            $table->string('nama_pengirim');
            $table->string('nama_penerima');
            $table->text('alamat');
            $table->string('no_telp_pengirim');
            $table->string('no_telp_penerima');
            $table->date('tgl_masuk');
            $table->text('deskripsi');
            $table->integer('berat');
            $table->integer('harga');
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
        Schema::dropIfExists('pengirimen');
    }
}
