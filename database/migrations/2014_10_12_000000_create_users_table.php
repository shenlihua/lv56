<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id');
            $table->integer('shop_id');
            $table->bigInteger('phone');
            $table->string('name');
            $table->string('email',100);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->unique(['merchant_id','shop_id','phone']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
