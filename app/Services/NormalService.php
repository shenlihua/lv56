<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class NormalService
{
    public function data()
    {
        return 123;
    }
    /*
     * 获取资源路径
     * */
    public function storagePath($dis='')
    {
        return '/storage/';
    }
}