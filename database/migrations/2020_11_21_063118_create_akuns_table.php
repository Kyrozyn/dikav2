<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akuns', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('password');
            $table->string('role');
        });

        DB::table('akuns')->insert(
            [
                ['username' => 'andika','password' => '12345678','role' => 'Kepala Gudang'],
                ['username' => 'direktur','password' => '12345678','role' => 'Direktur']
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akuns');
    }
}
