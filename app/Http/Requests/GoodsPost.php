<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsPost extends CommonPost
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'cid' => 'required',
            'name' => 'required',
            'img' => 'required',
            'sort' => 'min:0',
            'intro' => 'required',
            'content' => 'required',
            'attr' => ['required',function($attribute, $value, $fail) {
                foreach($value as $key=>$vo) {

                    for($i=0;$i<count($value['name']);$i++){
                        if(empty($value['name'][$i])) {
                            return $fail('属性'.($i+1).'中的名称不能为空');
                        }
                        if(empty($value['price'][$i]) || !is_numeric($value['price'][$i]) || $value['price'][$i]<0) {
                            return $fail('属性'.($i+1).'中的价格必须是正实数');
                        }
                        if(empty($value['stock'][$i]) || !is_numeric($value['stock'][$i]) || $value['stock'][$i]<0) {
                            return $fail('属性'.($i+1).'中的价格必须是正实数');
                        }
                    }
                }
            }],
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
            'cid.required' => '商品分类必须选择',
            'name.required' => '商品分类名称必须输入',
            'img.required'  => '商品图片必须上传',
            'sort.min'  => '排序必须大于:value',
            'intro.required'  => '简介不能为空',
            'content.required'  => '详情不能为空',
            'attr.required'  => '属性必须填写',
        ];
    }

    public function validateCheckAttr($foo)
    {
        dump($foo);exit;
    }
}
