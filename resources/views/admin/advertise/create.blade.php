@extends('admin.layout.index')
@section('content')
    <!-- 显示错误的信息-->
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
            <span > <i class="icon-magic"></i>添加广告</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('admin/advertise')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="mws-form-block">
                    <div class="mws-form-row" style="width: 800px;">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item">
                            <select name="status" class="large">
                                <option value="1">启用</option>
                                <option value="0">禁用</option>
                            </select>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">广告名:</label>
                        <div class="mws-form-item">
                            <input type="text" name="title" class="small" placeholder="广告名" value="{{old('title')}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">广告地址:</label>
                        <div class="mws-form-item">
                            <input type="text" name="advertise_https" class="small" placeholder="广告地址" value="{{old('advertise_https')}}">
                        </div>
                    </div>


                    <div class="mws-form-row" style="width: 800px;">
                        <label class="mws-form-label">logo:</label>
                        <div class="mws-form-item">
                            <input type="file" name="image" class="small" >
                        </div>
                    </div>

                </div>

                <div class="mws-button-row">
                    <input type="submit" value="添加" class="btn btn-success">

                    <input type="reset" value="重置" class="btn btn-info ">
                </div>
                <div id="mydiv">
                    <img src="/d/images/logo.png" alt="mws admin">
                </div>
            </form>
        </div>
    </div>


@endsection



@section('title')
    英雄联盟
@endsection
