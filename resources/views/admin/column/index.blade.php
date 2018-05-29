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
            <span><i class="icon-table"></i>栏目列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width: 400px;">栏目名称</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $v)
                    <tr>
                        <td>{{ $v -> id }}</td>
                        <td>{{ $v -> cname }}</td>
                        <td>{{ $v -> created_at }}</td>
                        <td>
                            <a href="/admin/column/{{$v->id}}/edit" class="btn btn-warning">修改</a>
                            <form action="/admin/column/{{$v->id}}" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="删除" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('title')
    英雄联盟
@endsection  