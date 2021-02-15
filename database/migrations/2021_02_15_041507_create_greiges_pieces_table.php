<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreigesPiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('greiges_pieces', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse_greige_id')->unsigned();
            $table->float('weight');
            $table->float('meter');
            $table->float('yard');
            $table->string('status');
            $table->dateTime('current_state');
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
        Schema::dropIfExists('greiges_pieces');
    }
}
