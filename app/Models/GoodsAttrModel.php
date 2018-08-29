<?php

namespace App\Models;


class GoodsAttrModel extends CommonModel
{
    //
    protected $table='goods_attr';

    public $timestamps = false;
    protected $is_show_ms = false; //关闭商户字段
    protected $guarded = [];


}
