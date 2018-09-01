<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodsCateModel extends CommonModel
{
    use SoftDeletes;

    //
    protected $table='goods_cate';

    public $timestamps = false;


    /*
     * 属性注入
     * */
    public function setAttribute($key, $value)
    {
        parent::setAttribute($key,$value);
//        dump($this->exists);exit; //表示  true编辑  和 false新增
        $this->attributes['last_time'] = Carbon::now()->timestamp;
    }
}

class GoodsCateObserver
{
    /**
     * 监听用户创建事件.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(GoodsCateModel $model)
    {
        //
//        $model->last_time = Carbon::now()->timestamp;
    }

    /**
     * 监听用户删除事件.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(GoodsCateModel $model)
    {
        //
    }
}
