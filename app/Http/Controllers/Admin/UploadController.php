<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends CommonController
{
    //
    public function upload(Request $request,$file_type)
    {
        $file_type = $file_type.'/'.$this->merchant_id.'_'.$this->shop_id.'/'.date('Y-m-d');
        $file = $request->file('file');

        $path = $file->store($file_type,'public');
//        dump(Storage::disk('public')->getVisibility($path));
//        echo asset('storage/'.$path,true).PHP_EOL;
        return ['code'=>1,'msg'=>'上传成功','path'=>$path];
    }

    //
    public function layeditUpload(Request $request)
    {
        $file_type = 'layerEdit/'.$this->merchant_id.'_'.$this->shop_id.'/'.date('Y-m-d');
        $file = $request->file('file');

        $path = $file->store($file_type,'public');
//        dump(Storage::disk('public')->getVisibility($path));
//        echo asset('storage/'.$path,true).PHP_EOL;
        $path = '/storage/'.$path;
        return ['code'=>0,'msg'=>'上传成功','data'=>['src'=>$path]];
    }
}
