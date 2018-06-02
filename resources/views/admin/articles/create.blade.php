@extends('admin.layout.index')
@section('content')
 <!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
    <!-- 显示错误的信息 -->
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
            <span>{{$title}}</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/articles" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">所属标签</label>
                        <div class="mws-form-item">
                            <select class="small" name="ftype">
                                <option value="0" selected>生活</option>
                                <option value="1">情感</option>
                                <option value="2">军事</option>
                                <option value="3">汽车</option>
                            </select>
                        </div>
                    </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章标题</label>
                        <div class="mws-form-item">
                            <input type="text" name="title" class="small" value="{{ old('title') }}">
                        </div>
                    </div>  

                    <div class="mws-form-row">
                        <label class="mws-form-label">文章内容</label>
                        <div class="mws-form-item">
                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="content" class="small" type="text/plain">
                        </script>
                        </div>
                    </div>
                   
                    
                <div class="mws-button-row">
                    <input type="submit" value="文章添加" class="btn btn-success">
                    <input type="reset" value="文章重置" class="btn btn-info">
                </div>
            </form>
        </div>      
    </div>
<!-- 实例化编辑器 -->
<script type="text/javascript">
     var ue = UE.getEditor('container',{
            toolbars: [
                ['bold', //加粗
                 'italic', //斜体
                 'underline', //下划线
                 'undo', //撤销
                 'simpleupload', //单图上传
                 'emotion', //表情
                ]
            ]
        });
    </script>
@endsection
