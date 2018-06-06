@extends('home.layout.index')
@section('content')
<head>

<link rel="stylesheet" type="text/css" href="/homeblog/css/timeline.css">


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } function showSide(){$('.navbar-nav').toggle();}</script>
<link rel="stylesheet" href="/homeblog/plugin/layer/3.0/skin/default/layer.css?v=3.0.3303" id="layuicss-skinlayercss">
</head>



<nav class="breadcrumb">
    <div class="container"><i class="Hui-iconfont"></i> <a href="/home/index" class="c-primary">首页</a> <span class="c-gray en">&gt;</span> <span class="c-gray">碎言碎语</span></div>
</nav>

<section class="container mt-20">
    <div class="container-fluid">
        <div class="timeline">
            @foreach($data as $k => $v)
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-picture">
                        <img src="/homeblog/css/timeline/cd-icon-location.svg" alt="position">
                    </div>
                    <div class="cd-timeline-content">
                        <h4>{{ $v -> title }}</h4>
                        <p style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;"> {!! $v -> content !!} </p>
                        <a href="/home/articledetail/{{ $v -> id }}" class="f-r"><input class="btn btn-success size-S" type="button" value="更多"></a>
                        <span class="cd-date">{{ $v -> created_at }}</span>
                    </div>
                </div>
            @endforeach
        </div>
            <div class="page dataTables_paginate paging_full_numbers">
                {!! $data->render() !!}
            </div>
    </div>

</section>


@endsection



@section('title')
    英雄联盟
@endsection