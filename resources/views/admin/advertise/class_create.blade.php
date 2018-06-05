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
            <span><i class="icon-magic"></i>栏目添加</span>
        </div>
        <form class="mws-form" action="/admin/column" method="post">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">所属栏目</label>
                    <div class="mws-form-item">
                        <select class="small" name="pid">
                            <option value="0">-- 请选择 --</option>
                        </select>
                    </div>
                </div>
            </div>

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

@endsection

