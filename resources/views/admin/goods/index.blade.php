@extends('admin.layout')
@section('title', '后台管理首页--空白页面')

@section('crumb')
    <i class="fa fa-sitemap fa-fw"></i> 商品管理 / 商品分类
@endsection

@section('content')

        <div class="row panel-body">
            <div class="col-sm-5">
                <a href="{{url('admin/goodsAdd')}}" class="btn btn-primary">添加商品</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>商品名称</th>
                    <th>分类名</th>
                    <th>售价</th>
                    <th>原价</th>
                    <th>库存</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
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