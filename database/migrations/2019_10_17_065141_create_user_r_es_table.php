<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_res', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unique();
            $table->string('property_address');
            $table->string('property_title');
            $table->string('date_o_b');
            $table->string('surname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('email');
            $table->string('phone_number');
            $table->string('place_address');
            $table->string('occupation');
            $table->string('type_of_o');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('user_res');
    }
}
