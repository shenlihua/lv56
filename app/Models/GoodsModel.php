<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodsModel extends CommonModel
{
    use SoftDeletes;

    //
    protected $table='goods';

    protected $casts = [
        'img' => 'array',
    ];

    /**
     * 获取多属性
     */
    public function attr()
    {
        return $this->hasMany('App\Models\GoodsAttrModel','gid','id');
    }

    /**
     * 获取多属性
     */
    public function attrOne()
    {
        return $this->hasOne('App\Models\GoodsAttrModel','gid','id');
    }

    /**
     * 获取单个属性
     */
    public function category()
    {
        return $this->belongsTo('App\Models\GoodsCateModel','cid','id');
    }



}
