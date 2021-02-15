<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorProcessOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_process_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('color_number_id');
            $table->integer('color_process_ref_id');
            $table->integer('color_process_option_id');
            $table->integer('position');
            $table->integer('program_ref_id');
            $table->integer('chemical_id');
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
        Schema::dropIfExists('color_process_orders');
    }
}
