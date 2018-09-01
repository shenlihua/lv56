<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GoodsCatePost;
use App\Http\Requests\GoodsPost;
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

        $input_data = $request->input();
        $model = new \App\Models\GoodsCateModel();

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
        $model = new \App\Models\GoodsModel();
//        dump($model->find(10)->attr()->first());exit;
        $model = $model->with('attr','category')->paginate();
//        dump($model);exit;
        return view('admin.goods.index',[
            'model' => $model
        ]);
    }

    public function add(Request $request,$id=0)
    {
        $model = new \App\Models\GoodsModel();
//        dump($model->find(10)->attr()->first());exit;
        $where = [
            ['id',$id]
        ];
        $model = $model->with('attrOne','category')->firstOrNew($where);
//        dump($model->img);exit;
        $cate_model = new \App\Models\GoodsCateModel();
        $cate_list = $cate_model->where([['status','=',1]])->orderby('sort','asc')->get();
//        dump($model);exit;
        return view('admin.goods.add',[
            'model' =>$model,
            'cate_list' => $cate_list,
        ]);
    }

    public function addAction(GoodsPost $request)
    {
        $input_data = $request->input();
//        dump($input_data);exit;



        try{
            $where['merchant_id'] = $this->merchant_id;
            $where['shop_id'] = $this->shop_id;
            $where['id'] = $input_data['id'];

            $model = new \App\Models\GoodsModel();
            $attr_model = new \App\Models\GoodsAttrModel();
            $model = $model->updateOrCreate($where,$input_data);
            //商品属性
            $attr_data =$rev_del_data  =[];
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

                $arr = [
                    'name' => $input_data['attr']['name'][$i],
                    'price' => $input_data['attr']['price'][$i],
                    'stock' => $input_data['attr']['stock'][$i],
                    'attr' => $attr
                ];

                if($input_data['attr']['id'][$i]){//编辑
                    //需要保留的data
                    $rev_del_data[] = $input_data['attr']['id'][$i];

                    $where = [
                        ['id',$input_data['attr']['id'][$i]]
                    ];
                    $model->attr()->updateOrCreate($where,$arr);
                }else {//新增
                    $attr_data[] = $arr;
                }
            }

            //删除多余的属性
            $model->attr()->whereNotIn('id',$rev_del_data)->delete();

            //创建属性
            $model->attr()->createMany($attr_data);
//            $attr_data = array_map(function($val)use ($id){
//                return array_merge($val,['gid'=>$id]);
//            },$attr_data);
//            dump($attr_data);
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
