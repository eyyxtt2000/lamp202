@extends('admin.layout.index')
@section('content')


            <!-- 内容开始 -->
            <div class="container">
                <div class="">
                {{$data->content}}
                </div>
            </div>
            <div id="mydiv">
                <img src="/d/images/logo.png" alt="mws admin">
            </div>
            <!-- 内容结束-->

@endsection



@section('title')
    英雄联盟
@endsection