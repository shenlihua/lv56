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
        return view('admin.goods.cateAdd');
    }

    public function cateAddAction(GoodsCatePost $request)
    {
        $data = \App\Models\GoodsCateModel::find();
        return $data;
    }
}
