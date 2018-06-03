@extends('admin.layout.index')
@section('content')
<!-- 内容开始 -->
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>{{$articles->title}}</span>
            
        </div>
        <div class="mws-panel-body">
        <span style="color:#ccc;">作者：{{$articles->author}}&nbsp;&nbsp;&nbsp;发表于：{{$articles->created_at}}</span>
        <hr>
            {!! $articles -> content !!}
        </div>
    </div>
<!-- 内容结束-->
@endsection
@section('title')
    英雄联盟
@endsection