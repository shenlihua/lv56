<?php

namespace App\Models;

use App\Scopes\MerchantScope;
use App\Scopes\ShopScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommonModel extends Model
{
    public static $merchant_id = 0;
    public static $shop_id = 0;
    public static $fields_status = ['删除','正常','禁用'];

    protected static $table_fillable = [];


    public function __construct(array $attributes = [])
    {
        //白名单操作
        $table = $this->getTable();
        if(empty($this->fillable)){
            if(!isset(self::$table_fillable[$table])){
                $columns = DB::select('show columns from '.$this->getConnection()->getConfig('prefix').$table);
                self::$table_fillable[$table] = array_column($columns,'Field');
            }
            $this->fillable = self::$table_fillable[$table];
        }

        parent::__construct($attributes);
    }

   /**
     * 模型的“启动”方法.--注册全局查询对象
     *
     * @return void
     */
    protected static function boot($bind_merchant_bool=true)
    {
        parent::boot();
        if($bind_merchant_bool){
            static::addGlobalScope(new MerchantScope);
            static::addGlobalScope(new ShopScope);
        }
    }
}
