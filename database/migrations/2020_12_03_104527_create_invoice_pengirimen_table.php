<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_pengirimen', function (Blueprint $table) {
            $table->string('invoice_id_invoice');
            $table->string('pengiriman_no_resi');
            $table->string('posisix');
            $table->string('posisiy');
            $table->string('posisiz');
            $table->string('volume');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_pengirimen');
    }
}
