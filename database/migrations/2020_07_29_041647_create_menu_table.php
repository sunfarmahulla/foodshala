<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('restaurent_name')->nullable();
            $table->string('food_title');
            $table->enum('food_type',['veg','non-veg', 'veg-non-veg']);
            $table->string('location')->nullable();
            $table->string('food_discription')->nullable();
            $table->string('image');
            $table->string('actual_price');
            $table->string('discount_price');
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
        Schema::dropIfExists('menu');
    }
}
