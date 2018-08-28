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
            $table->decimal('price')->comment('商品价格');
            $table->decimal('activity_price')->comment('活动售价');
            $table->smallInteger('stock')->default(0)->comment('对应库存');
            $table->text('attr')->comment('属性');
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
