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
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
</div>
@endsection