@extends('admin.layout')
@section('title', '后台管理首页--空白页面')
@section('crumb')
    <i class="fa fa-sitemap fa-fw"></i> 商品管理 / 商品新增/编辑操作
@endsection

@inject('normal', 'App\Services\NormalService')

@section('style')
    <style>
        .goods-img{}
        .goods-img div{display:inline-block;margin: 0px 5px;}
        .goods-img div span{position: absolute;padding: 5px;background: red;color:#fff;cursor: pointer;}
        .goods-img div img{width: 140px;height: 140px;}

        .table-attr .glyphicon-minus-sign{color:red;cursor: pointer;}
    </style>
@endsection

@section('content')

    <div class="row">
        <form class="form-horizontal" action="{{url('admin/goodsAddAction')}}" method="post" id="form">
            {{ csrf_field() }}
            <input type="hidden" name="id" value=""/>
            <div class="form-group">
                <label  class="col-sm-2 control-label">商品分类</label>
                <div class="col-sm-10">
                    <select name="cid" class="form-control">
                        <option value="">请选择</option>
                        @foreach($cate_list as $vo)
                            <option value="{{$vo->id}}">{{$vo->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="" maxlength="100" placeholder="名称">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">图片</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-2">
                            <button type="button" class="layui-btn" id="upload">
                                <i class="layui-icon">&#xe67c;</i>上传图片
                            </button>
                        </div>
                        <div class="col-sm-10 goods-img">

                            <div>
                                <span class="glyphicon glyphicon-remove"></span>
                                <img src="{{$normal->storagePath().'goods/1_1/2018-08-28/zbohNuYBvmFZrjwChEJQdHBLjyBs0JeqaEv1godg.png'}}" alt="">
                                <input type="hidden" name="img[]" value=""/>
                            </div>
                            <div>
                                <span class="glyphicon glyphicon-remove"></span>
                                <img src="{{$normal->storagePath().'goods/1_1/2018-08-28/zbohNuYBvmFZrjwChEJQdHBLjyBs0JeqaEv1godg.png'}}" alt="" >
                                <input type="hidden" name="img[]" value=""/>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label  class="col-sm-2 control-label">
                    商品属性
                    <span class="btn glyphicon glyphicon-plus attr-add"></span>
                </label>
                <div class="col-sm-10">

                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label  class="col-sm-4 control-label">属性名称: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="attr[name][]" value="">
                                    </div>
                                    <label  class="col-sm-4 control-label">商品价格: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="attr[price][]" value="">
                                    </div>
                                    <label  class="col-sm-4 control-label">商品库存: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="attr[stock][]" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <table class="table text-center table-attr">
                                    <thead>
                                    <tr>
                                        <th>参数名</th>
                                        <th>参数值</th>
                                        <th><span class="btn glyphicon glyphicon-plus btn-attr-add"></span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> <input type="text" class="form-control" name="attr[attr][key][]" value="" ></td>
                                        <td><input type="text" class="form-control" name="attr[attr][value][]" value="" ></td>
                                        <td><span class="glyphicon glyphicon-minus-sign btn-attr-del"></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" name="attr[attr][key][]" value="end"/>
                                <input type="hidden" name="attr[attr][value][]" value="end"/>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="sort" value="" max="100" min="1">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="status"  value="1"  > 启用
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="2"  > 禁用
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">简介</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="intro" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">内容</label>
                <div class="col-sm-10">
                    <textarea id="demo" name="content" style="display: none;"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" >保存

                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.row -->
@endsection


@section('script')

    <script>
        var storage_path = "{{$normal->storagePath()}}";

        layui.use(['layer','upload','layedit'], function(){
            var layer = layui.layer;
            var upload = layui.upload;
            var layedit = layui.layedit;

            layedit.set({
                uploadImage: {
                    url: "{{url('admin/layeditUpload')}}" //接口url
                }
            });

            layedit.build('demo'); //建立编辑器
            //执行实例
            var uploadInst = upload.render({
                elem: '#upload' //绑定元素
                ,url: '{{url('admin/fileUpload',['goods'])}}' //上传接口
                ,acceptMime:'image/*'
                ,done: function(res){
                    //上传完毕回调
                    //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
                    // var item = this.item;
                    var html = '<div>\n' +
                        '<span class="glyphicon glyphicon-remove"></span>' +
                        '<img src="'+storage_path+res.path+'" alt="" >'+
                        '<input type="hidden" name="img[]" value="'+res.path+'"/>'+
                        '</div>';
                    $(".goods-img").append(html)
                }
                ,error: function(){
                    //请求异常回调
                    layer.msg('上传异常')
                }
            });
        });

        $(function(){
            $(".goods-img").on('click','.glyphicon-remove',function(){
                $(this).parent().remove()
            });
            $("#submit").click(function(){
                $.post($("#form").attr('action'),$("#form").serialize(),function(result){
                    layer.msg(result.msg)
                })
            });
            $("#form").on('click','.attr-add',function(){
                var html = ' <div class="panel panel-default">\n' +
                    '\n' +
                    '                        <div class="panel-body">\n' +
                    '                            <div class="col-sm-5">\n' +
                    '                                <div class="form-group">\n' +
                    '                                    <label  class="col-sm-4 control-label">属性名称: </label>\n' +
                    '                                    <div class="col-sm-8">\n' +
                    '                                        <input type="text" class="form-control" name="attr[name][]" value="">\n' +
                    '                                    </div>\n' +
                    '                                    <label  class="col-sm-4 control-label">商品价格: </label>\n' +
                    '                                    <div class="col-sm-8">\n' +
                    '                                        <input type="number" class="form-control" name="attr[price][]" value="">\n' +
                    '                                    </div>\n' +
                    '                                    <label  class="col-sm-4 control-label">商品库存: </label>\n' +
                    '                                    <div class="col-sm-8">\n' +
                    '                                        <input type="number" class="form-control" name="attr[stock][]" value="">\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                            <div class="col-sm-5">\n' +
                    '                                <table class="table text-center table-attr">\n' +
                    '                                    <thead>\n' +
                    '                                    <tr>\n' +
                    '                                        <th>参数名</th>\n' +
                    '                                        <th>参数值</th>\n' +
                    '                                        <th><span class="btn glyphicon glyphicon-plus btn-attr-add"></span></th>\n' +
                    '                                    </tr>\n' +
                    '                                    </thead>\n' +
                    '                                    <tbody>\n' +
                    '                                    <tr>\n' +
                    '                                        <td> <input type="text" class="form-control" name="attr[attr][key][]" value="" ></td>\n' +
                    '                                        <td><input type="text" class="form-control" name="attr[attr][value][]" value="" ></td>\n' +
                    '                                        <td><span class="glyphicon glyphicon-minus-sign btn-attr-del"></span></td>\n' +
                    '                                    </tr>\n' +
                    '                                    </tbody>\n' +
                    '                                </table>\n' +
                    '                                <input type="hidden" name="attr[attr][key][]" value="end"/>\n' +
                    '                                <input type="hidden" name="attr[attr][value][]" value="end"/>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>\n';
                $(this).parent().next().append(html)
            });
            //添加属性
            $("#form").on('click','.btn-attr-add',function(){
                var html = '<tr>\n' +
                    '<tr>\n' +
                    '<td> <input type="text" class="form-control" name="attr[attr][key][]" value="" ></td>\n' +
                    '<td><input type="text" class="form-control" name="attr[attr][value][]" value="" ></td>\n' +
                    '<td><span class="glyphicon glyphicon-minus-sign btn-attr-del"></span></td>\n' +
                    '</tr>\n';
                $(this).parents('.table-attr').find('tbody').append(html)
            });
            //删除属性
            $("#form").on('click','.btn-attr-del',function(){

                $(this).parent().parent().remove();
            })

        })
    </script>
@endsection