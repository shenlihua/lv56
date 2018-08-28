<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Goods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->comment('商户id');
            $table->integer('shop_id')->comment('店铺id');
            $table->integer('cid')->comment('分类id');//分类id
            $table->string('name')->comment('商品名称');//商品名称
            $table->string('img')->comment('商品图片 用逗号分割');//商品图片
            $table->string('intro')->comment('商品简介');//简介
            $table->string('content')->commnet('商品详细内容');//详细内容
            $table->smallInteger('sold_num')->default(0)->comment('销售量');//销售数量
            $table->tinyInteger('sort')->default(100)->comment('排序');//详细内容
            $table->tinyInteger('status')->default(1)->comment('商品状态 1正常2关闭');//详细内容
            $table->timestamps();
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
        Schema::dropIfExists('goods');
    }
}
