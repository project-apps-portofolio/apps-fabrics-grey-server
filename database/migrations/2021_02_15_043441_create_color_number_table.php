<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_number', function (Blueprint $table) {
            $table->id();
            $table->integer('previous_color_number_id');
            $table->integer('customer_id');
            $table->integer('color_ref_id');
            $table->string('color_code');
            $table->string('color_common_name');
            $table->integer('is_polyester');
            $table->string('fabric_type');
            $table->float('total_price');
            $table->integer('is_standard');
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
        Schema::dropIfExists('color_number');
    }
}
