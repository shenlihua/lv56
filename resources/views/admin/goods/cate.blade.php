@extends('admin.layout')
@section('title', '后台管理首页--空白页面')

@section('crumb')
    <i class="fa fa-sitemap fa-fw"></i> 商品管理 / 商品分类
@endsection

@section('content')

        <div class="row panel-body">
            <div class="col-sm-5">
                <a href="{{url('admin/goodsCateAdd')}}" class="btn btn-primary">添加分类</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>分类名</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($model as $vo)
                    <tr>
                        <td>{{$vo->id}}</td>
                        <td>{{$vo->name}}</td>
                        <td>{{$vo::$fields_status[$vo->status]}}</td>
                        <td>
                            <a href="{{url('admin/goodsCateAdd',[$vo->id])}}">编辑</a>
                            <a href="javascript:;" class="data-del" data-id="{{$vo->id}}">删除</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
        {{ $model->links() }}
</div>
@endsection

@section('script')
    <script>
        layui.use('layer', function(){
            var layer = layui.layer;
        });

        $(".data-del").click(function(){
            var $this= $(this);
            var id= $this.data('id');
            layer.confirm("是否删除该数据",function(index){
                $.post("{{url('admin/goodsCateDel')}}",{id:id},function(result){
                    layer.msg(result.msg);
                    if(result.code==1){
                        $this.parent().parent().remove();
                    }
                })
            })
        })

    </script>
@endsection