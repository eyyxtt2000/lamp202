@extends('admin.layout.index')

@section('content')
    @if(session('error'))
    <div class="mws-form-message error">
       {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="mws-form-message success">
         {{ session('success') }}
    </div>
    @endif
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 栏目列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <form action="/admin/column" method="get">
                    <label>搜索: <input type="text" aria-controls="DataTables_Table_1" name="sousuo"><input type="submit" class="btn btn-info"></label>
                </form>
            </div>
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width: 400px;">栏目名称</th>
                        <th>所属栏目</th>
                        <th>栏目路径</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $v)
                    <tr>
                        <td>{{ $v -> id }}</td>
                        <td>{{ $v -> cname }}</td>
                        <td>{{ $v -> pid }}</td>
                        <td>{{ $v -> path }}</td>
                        <td>{{ $v -> created_at }}</td>
                        <td>
                            <a href="/admin/column/{{$v->id}}/edit" class="btn btn-warning">修改</a>
                            <form action="/admin/column/{{$v->id}}" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="删除" onclick="return confirm('确定删除吗?')" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="page dataTables_paginate paging_full_numbers">
                {!! $data->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('title')
    英雄联盟
@endsection