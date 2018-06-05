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
            <span > <i class="icon-magic"></i>修改链接</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/friendlylink/{{ $data->id }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{ method_field('PUT') }}

                <div class="mws-form-block">
                    <div class="mws-form-row" style="width: 800px;">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item">

                            <select name="status" class="large">
                            @if($data->status==0)
                                <option value="1" selected>启用</option>
                                <option value="0">禁用</option>
                            @else
                                <option value="1">启用</option>
                                <option value="0" selected>禁用</option>
                            @endif

                            </select>

                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">链接名:</label>
                        <div class="mws-form-item">
                            <input type="text" name="title" class="small" placeholder="链接名" value="{{ $data->title }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">链接地址:</label>
                        <div class="mws-form-item">
                            <input type="text" name="friendly_https" class="small" placeholder="链接地址" value="{{ $data->friendly_https }}">
                        </div>
                    </div>


                    <div class="mws-form-row" style="width: 800px;">
                        <label class="mws-form-label">原 logo 图片:</label>
                        <div class="mws-form-item">
                            <img style="width:200px;height:120px" src="{{ url('/').$data->image_path  }}" alt="原 logo 图片">
                            <br>
                            <br>
                            不选择默认为原图片
                            <br>
                            <input type="file" name="image" class="small" />
                        </div>
                    </div>

                </div>

                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-success">

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
