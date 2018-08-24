<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GoodsCatePost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends CommonController
{
    public function cate()
    {
        return view('admin.goods.cate');
    }

    public function cateAdd()
    {
//        $data = new \App\Models\GoodsCateModel();
        dump(\App\Models\GoodsCateModel::first());
        dump($data->getConnection());
        dump($data::first());
//        dump(\App\Models\GoodsCateModel::find(1));
        return view('admin.goods.cateAdd');
    }

    public function cateAddAction(GoodsCatePost $request)
    {
        $data=\App\Models\GoodsCateModel::find();
        return $data;
    }
}
