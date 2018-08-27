<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GoodsAttr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goods_attr', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid')->commend('商品id');
            $table->string('name',20)->comment('属性名');
            $table->decimal('price')->comment('商品售价');
            $table->index(['gid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('goods_attr');
    }
}
