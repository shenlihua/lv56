<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GoodsCatePost;
use App\Models\GoodsCateModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class GoodsController extends CommonController
{
    public function cate()
    {
        $model = \App\Models\GoodsCateModel::orderBy('sort', 'asc')->paginate();
        return view('admin.goods.cate',[
            'model' => $model,
            'fields_status' => \App\Models\GoodsCateModel::$fields_status
        ]);
    }

    public function cateAdd(Request $request,$id=0)
    {
        $model = new \App\Models\GoodsCateModel();
        $id && $model = $model->where('id','=',$id)->first();
        return view('admin.goods.cateAdd',[
            'model' => $model
        ]);
    }

    public function cateAddAction(GoodsCatePost $request)
    {
//        dump($request->input());exit;
        $input_data = $request->input();
        $model = new \App\Models\GoodsCateModel();
//        $input_data['last_time']=0;
        $result = $this->_dataSave($model,$input_data);
        return $result;

    }

    public function cateDel(Request $request,$id=0)
    {
        $id = $request->input('id',$id);
        $model = new \App\Models\GoodsCateModel();
        $model = $model->where('id','=',$id)->first();
        $bool = true;
        $model && $bool = $model->delete();
        if ( $bool ) {
            return ['code'=>1,'msg'=>'删除成功'];
        } else {
            return ['code'=>0,'msg'=>'删除失败'];
        }
    }

    public function index()
    {
        return view('admin.goods.index');
    }

    public function add()
    {
        $cate_model = new \App\Models\GoodsCateModel();
        $cate_list = $cate_model->where([['status','=',1]])->orderby('sort','asc')->get();

        return view('admin.goods.add',[
            'cate_list' => $cate_list,
        ]);
    }

    public function addAction(Request $request)
    {
        $input_data = $request->input();
//        dump($input_data);exit;

        //商品属性
        $attr_data =[];
        for($i=0;$i<count($input_data['attr']['name']);$i++) {
            $attr=[];

            foreach($input_data['attr']['attr']['key'] as $k=>$st) {
                $attr_key = $st;
                $attr_value = $input_data['attr']['attr']['value'][$k];
                unset(
                    $input_data['attr']['attr']['key'][$k],
                    $input_data['attr']['attr']['value'][$k]
                );
                if($st=='end'){
                    break;
                } else {
                    $attr[$attr_key] = $attr_value;
                }
            }
//            dump($attr);exit;
//            dump($key);
//            dump($input_data['attr']['name'][$i]);exit;
            $attr_data[] = [
                'name' => $input_data['attr']['name'][$i],
                'price' => $input_data['attr']['price'][$i],
                'stock' => $input_data['attr']['stock'][$i],
                'attr' => json_encode($attr)
            ];
        }
//        dump($attr_data);exit;
        $where['merchant_id'] = $this->merchant_id;
        $where['shop_id'] = $this->shop_id;

        try{
            $where['id'] = $input_data['id'];
            $model = new \App\Models\GoodsModel();
            $model = $model->updateOrCreate($where,$input_data);
            return ['code'=>1,'msg'=>'操作成功:'];
        } catch (\Exception $e) {
            return ['code'=>0,'msg'=>'操作异常:'.$e->getMessage()];
        }


        return $result;

    }

    public function del(Request $request,$id=0)
    {
        $id = $request->input('id',$id);
        $model = new \App\Models\GoodsModel();
        $model = $model->where('id','=',$id)->first();
        $bool = true;
        $model && $bool = $model->delete();
        if ( $bool ) {
            return ['code'=>1,'msg'=>'删除成功'];
        } else {
            return ['code'=>0,'msg'=>'删除失败'];
        }
    }
}
