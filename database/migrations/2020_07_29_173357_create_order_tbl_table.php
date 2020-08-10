<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('total_price');
            $table->string('invoice_id');
            $table->enum('order_status',['pending','process', 'shipped']);
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
        Schema::dropIfExists('order_tbl');
    }
}
