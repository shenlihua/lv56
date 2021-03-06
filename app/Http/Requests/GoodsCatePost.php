<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsCatePost extends CommonPost
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:10',
        ];
    }

    /**
     * 获取被定义验证规则的错误消息
     *
     * @return array
     * @translator laravelacademy.org
     */
    public function messages(){
        return [
            'name.required' => '商品分类名称必须输入',
            'name.max'  => '商品分类名长度不能超过10个字符',
        ];
    }


}
