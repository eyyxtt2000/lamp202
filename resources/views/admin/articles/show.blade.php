@extends('admin.layout.index')
@section('content')
 <!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>

<!-- 内容开始 -->
    <div class="mws-panel grid_8">
    
        <div class="mws-panel-header">
            <span>{{$articles->title}}</span>
            
        </div>
        <div class="mws-panel">
            作者  ：<span>{{$articles->author}}</span>&nbsp;&nbsp;&nbsp;发表于： <span>{{$articles->created_at}}</span>
        </div>
        <div class="mws-form-inline">
            <div class="mws-form-row">
                <script id="container" name="content" class="small" type="text/plain">
                     {!!$articles -> content!!}
                </script>  
            </div>
        </div>
       
    </div>
<!-- 内容结束-->
<script type="text/javascript">
    var ue = UE.getEditor('container',{
        toolbars: [
    []
]
    });
</script>
@endsection



@section('title')
    英雄联盟
@endsection