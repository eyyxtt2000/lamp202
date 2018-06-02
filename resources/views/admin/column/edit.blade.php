@extends('admin.layout.index')

@section('content')
    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>栏目添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/column/{{ $data -> id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">所属栏目</label>
                        <div class="mws-form-item">
                            <select class="small" name="pid">
                                <option value="0">-- 请选择 --</option>
                                @foreach($datas as $k => $v)
                                @if( $v -> id == $data -> pid )
                                    <option selected value="{{ $v -> id }}">{{ $v -> cname }}</option>
                                @endif
                                <option value="{{ $v -> id }}">{{ $v -> cname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">栏目名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="cname" value="{{ $data -> cname }}" class="small">
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('title')
    英雄联盟
@endsection