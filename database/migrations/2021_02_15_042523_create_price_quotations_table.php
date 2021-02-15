<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_quotations', function (Blueprint $table) {
            $table->id();
            $table->integer('previos_quotation_id');
            $table->integer('user_id');
            $table->date('offer_date');
            $table->integer('customer_id');
            $table->string('jenis_kain');
            $table->string('jenis_proces');
            $table->integer('price_quotation_number');
            $table->integer('nomer_s');
            $table->integer('nomer_h');
            $table->string('notes');
            $table->integer('usd_price');
            $table->integer('idr_price');
            $table->date('approval_date');
            $table->string('scan_approval');
            $table->date('current_state');
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
        Schema::dropIfExists('price_quotations');
    }
}
