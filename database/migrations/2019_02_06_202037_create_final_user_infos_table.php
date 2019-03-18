<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->integer('total_cost');
            $table->string('method_name');
            $table->integer('method_cost');
            $table->string('method_time');
            $table->string('address_fname');
            $table->string('address_sname');
            $table->string('address_appartmentname');
            $table->longText('address_street_details');
            $table->string('address_city');
            $table->string('address_location');
            $table->string('lat');
            $table->string('lng');
            $table->string('address_name');
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
        Schema::dropIfExists('final_user_infos');
    }
}
