<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseGreigesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_greiges', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('sales_order_id');
            $table->dateTime('incoming_date');
            $table->string('sj_number');
            $table->integer('po_number');
            $table->string('note');
            $table->float('total_weight');
            $table->float('total_in_meter');
            $table->float('total_in_yard');
            $table->string('status');
            $table->integer('storage_number');
            $table->string('nomor_sm');
            $table->string('code_kain_mentah');
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
        Schema::dropIfExists('warehouse_greiges');
    }
}
