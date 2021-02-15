<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceComponentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_component', function (Blueprint $table) {
            $table->id();
            $table->integer('price_quotation_id')->unsigned();
            $table->string('name');
            $table->integer('nomor_warna');
            $table->integer('usd_price');
            $table->integer('idr_price');
            $table->integer('qty');
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
        Schema::dropIfExists('price_component');
    }
}
