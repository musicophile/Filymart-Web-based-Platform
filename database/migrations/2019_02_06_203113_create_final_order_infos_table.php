<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalOrderInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_order_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->string('image');
            $table->integer('price');
            $table->integer('total');
            $table->integer('quantity');
            $table->interger('user_id');
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
        Schema::dropIfExists('final_order_infos');
    }
}
