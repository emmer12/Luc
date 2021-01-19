<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserComsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unique();
            $table->string('property_address');
            $table->string('org_name');
            $table->string('registration_no');
            $table->string('contact_no');
            $table->string('email')->unique();
            $table->string('use');
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
        Schema::dropIfExists('user_coms');
    }
}
