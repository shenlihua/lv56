<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GoodsCate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_cate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->comment('商户id');
            $table->integer('shop_id')->comment('店铺id');
            $table->string('name')->comment('分类名称');
            $table->tinyInteger('sort')->defalut(100);
            $table->tinyInteger('status')->default(1)->comment('状态1正常 2关闭');
            $table->integer('last_time');//最后一次操作时间
            $table->dateTime('deleted_at');
            $table->index(['merchant_id','shop_id']);
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
        Schema::dropIfExists('goods_cate');
    }
}
