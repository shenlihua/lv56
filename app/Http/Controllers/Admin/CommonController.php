<?php

namespace App\Http\Controllers\Admin;

use App\Models\CommonModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class CommonController extends Controller
{
    //商户id
    protected $merchant_id = 1;
    //店铺id
    protected $shop_id = 1;

    public function __construct()
    {
        CommonModel::$merchant_id = $this->merchant_id;
        CommonModel::$shop_id = $this->shop_id;
    }

    protected function _dataSave(CommonModel &$model,$input_data)
    {


        try{
            $primary_key = $model->getKeyName();
            $where[$primary_key] = empty($input_data[$primary_key]) ? 0 : $input_data[$primary_key];
            //判断是否是保存状态
            if(!$where[$primary_key]){
                $input_data['merchant_id'] = $this->merchant_id;
                $input_data['shop_id'] = $this->shop_id;
            }

            $where['merchant_id'] =  $this->merchant_id;
            $where['shop_id'] =  $this->shop_id;
            $model = $model->updateOrCreate($where,$input_data);
            return ['code'=>1,'msg'=>'操作成功:'];
        } catch (\Exception $e) {
            return ['code'=>0,'msg'=>'操作异常:'.$e->getMessage()];
        }
    }
}
