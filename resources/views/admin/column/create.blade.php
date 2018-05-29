@extends('admin.layout.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>栏目添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/column" method="post">
            {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">栏目名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="cname" class="small">
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-success">
                    <input type="reset" value="重置" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
@endsection