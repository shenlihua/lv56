<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GoodsModel extends CommonModel
{
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
}
