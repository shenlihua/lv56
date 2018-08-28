@extends('admin.layout')
@section('title', '后台管理首页--空白页面')
@section('crumb')
    <i class="fa fa-sitemap fa-fw"></i> 商品管理 / 商品分类操作
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{url('admin/goodsCateAddAction')}}" id="form">
            <input type="hidden" name="id" value="{{$model->id?$model->id:0}}"/>
            <div class="form-group">
                <label  class="col-sm-2 control-label">名称</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="{{$model->name}}" maxlength="10" placeholder="名称">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">排序</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="sort" value="{{$model->sort?$model->sort:100}}" max="100" min="1">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">状态</label>
                <div class="col-sm-6">
                    <label class="radio-inline">
                        <input type="radio" name="status"  value="1"  {{$model->status!=2?'checked':''}}> 启用
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="2"  {{$model->status==2?'checked':''}}> 禁用
                    </label>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-default" id="submit">保存</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.row -->
@endsection


@section('script')
    <script>
        $(function(){
            $("#submit").click(function(){
                $.post($("#form").attr('action'),$("#form").serialize(),function(result){
                    alert(result.msg);
                })
            })
        })
    </script>
@endsection