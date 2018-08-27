<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GoodsCatePost;
use App\Models\GoodsCateModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.goods.add');
    }

    public function addAction(GoodsCatePost $request)
    {
//        dump($request->input());exit;
        $input_data = $request->input();
        $model = new \App\Models\GoodsModel();
//        $input_data['last_time']=0;
        $result = $this->_dataSave($model,$input_data);
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
