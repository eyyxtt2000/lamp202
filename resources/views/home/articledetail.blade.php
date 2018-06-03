@extends('home.layout.index')     
@section('content') 

<nav class="breadcrumb">
  <div class="container"> <i class="Hui-iconfont"></i> <a href="/" class="c-primary">首页</a> <span class="c-gray en">&gt;</span>  <span class="c-gray">文章</span> <span class="c-gray en">&gt;</span>  <span class="c-gray">{{$detail->title}}</span></div>
</nav>

<section class="container pt-20">
    
    <div class="row w_main_row">
                
                
                <div class="col-lg-9 col-md-9 w_main_left">
                    <div class="panel panel-default  mb-20">
                        <div class="panel-body pt-10 pb-10">
                            <h2 class="c_titile">{{$detail->title}}</h2>
                            <p class="box_c"><span class="d_time">发布时间：{{$detail->created_at}}</span><span>编辑：<a href="mailto:wfyv@qq.com">{{$detail->author}}</a></span><span>阅读（88646）</span></p>
                            <ul class="infos">
                                     {!!$detail->content!!}
                                
                            </ul>
                                                            
                            <div class="keybq">
                                <p><span>关键字</span>：<a class="label label-default">个人博客</a><a class="label label-default">阿里云</a><a class="label label-default">空间</a></p>    
                            </div>
                            
                            
                            
                            <div class="nextinfo">
                            @if($prev)
                                <p class="last">上一篇：<a href="/home/articledetail/{{$prev->id}}">{{$prev->title}} </a></p>
                            @else
                                  <p class="last">上一篇：<a href="javascript:;">没有上一篇了 </a></p>
                            @endif


                            @if($next)
                                <p class="next">下一篇：<a href="/home/articledetail/{{$next->id}}">{{$next->title}}</a></p>
                            @else
                                <p class="next">下一篇：<a href="javascript:;">没有下一篇了</a></p>
                            @endif
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="panel panel-default  mb-20">
                        <div class="tab-category">
                <a href=""><strong>评论区</strong></a>
            </div>
                        <div class="panel-body">
                            <div class="panel-body" style="margin: 0 3%;">
                    <div class="mb-20">
                        <ul class="commentList">
                            <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://qzapp.qlogo.cn/qzapp/101388738/1CF8425D24660DB8C3EBB76C03D95F35/100"></i></a>
                                <div class="comment-main">
                                    <header class="comment-header">
                                        <div class="comment-meta"><a class="comment-author" href="#">老王</a>
                                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20" class="f-r">2014-8-31 15:20</time>
                                        </div>
                                    </header>
                                    <div class="comment-body">
                                        <p> 是的</p>
                                    </div>
                                </div>
                            </li>
                            <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://qzapp.qlogo.cn/qzapp/101388738/696C8A17B3383B88804BA92ECBAA5D81/100"></i></a>
                                <div class="comment-main">
                                    <header class="comment-header">
                                        <div class="comment-meta"><a class="comment-author" href="#">老王</a>
                                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20" class="f-r">2014-8-31 15:20</time>
                                        </div>
                                    </header>
                                    <div class="comment-body">
                                        <p> +1</p>
                                    </div>
                                </div>
                            </li>

                        </ul>
    
                    </div>
                    <div class="line"></div>
                    <!--用于评论-->
                    <div class="mt-20" id="ct">
                        <div id="err" class="Huialert Huialert-danger hidden radius">成功状态提示</div>
                         <div class="col-md-10" name="comment" style="height:280px" ><!-- 加载编辑器的容器 -->
                                        <script id="container" name="content" type="text/plain" style="height:210px">
                                            填写评论内容
                                        </script>
                                        <!-- 配置文件 -->
                                        <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
                                        <!-- 编辑器源码文件 -->
                                        <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
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
                                        </div>  <div class="wangEditor-container"><div class="wangEditor-menu-container clearfix" style="position: static; top: auto; width: 100%;"><div class="menu-group clearfix"><div class="menu-item clearfix"><a href="#" tabindex="-1"><i class="wangeditor-menu-img-terminal"></i></a><a href="#" tabindex="-1" class="selected" style="display: none;"><i class="wangeditor-menu-img-terminal"></i></a></div><div class="menu-item clearfix"><a href="#" tabindex="-1"><i class="wangeditor-menu-img-quotes-left"></i></a><a href="#" tabindex="-1" class="selected" style="display: none;"><i class="wangeditor-menu-img-quotes-left"></i></a></div><div class="menu-item clearfix"><a href="#" tabindex="-1"><i class="wangeditor-menu-img-bold"></i></a><a href="#" tabindex="-1" class="selected" style="display: none;"><i class="wangeditor-menu-img-bold"></i></a></div></div><div class="menu-group clearfix"><div class="menu-item clearfix"><a href="#" tabindex="-1"><i class="wangeditor-menu-img-picture"></i></a><a href="#" tabindex="-1" class="selected" style="display: none;"><i class="wangeditor-menu-img-picture"></i></a></div><div class="menu-item clearfix"><a href="#" tabindex="-1"><i class="wangeditor-menu-img-happy"></i></a><a href="#" tabindex="-1" class="selected" style="display: none;"><i class="wangeditor-menu-img-happy"></i></a></div></div><div class="menu-group clearfix"><div class="menu-item clearfix"><a href="#" tabindex="-1"><i class="wangeditor-menu-img-ccw"></i></a><a href="#" tabindex="-1" class="selected" style="display: none;"><i class="wangeditor-menu-img-ccw"></i></a></div><div class="menu-item clearfix"><a href="#" tabindex="-1"><i class="wangeditor-menu-img-enlarge2"></i></a><a href="#" tabindex="-1" class="selected" style="display: none;"><i class="wangeditor-menu-img-shrink2"></i></a></div></div></div></div>
                        <div class="text-r mt-10">
                            <button onclick="getPlainTxt()" class="btn btn-primary radius"> 发表评论</button>
                        </div>
                    </div>
                    <!--用于回复-->
                    <div class="comment hidden mt-20">
                        <div id="err2" class="Huialert Huialert-danger hidden radius">成功状态提示</div>
                            <textarea class="textarea" style="height:100px;"> </textarea>
                            <button onclick="hf(this);" type="button" class="btn btn-primary radius mt-10">回复</button>
                            <a class="cancelReply f-r mt-10">取消回复</a>
                    </div>

                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <!--热门推荐-->
    <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>热门推荐</strong></a>
            </div>
            <div class="tab-category-item">
                <ul class="index_recd">
                    <li>
                        <a href="#">阻止a标签href默认跳转事件</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276 </p>
                    </li>
                    <li>
                        <a href="#">PHP面试题汇总</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276 </p>
                    </li>
                    <li>
                        <a href="#">阻止a标签href默认跳转事件</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276 </p>
                    </li>
                    <li>
                        <a href="#">阻止a标签href默认跳转事件</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276 </p>
                    </li>
                    <li>
                        <a href="#">PHP面试题汇总</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276 </p>
                    </li>
                </ul>
            </div>
        </div>
                        
                    <!--图片-->
        <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>扫我关注</strong></a>
            </div>
            <div class="tab-category-item">
                <img data-original="temp/gg.jpg" class="img-responsive lazyload" alt="响应式图片" src="temp/gg.jpg" style="display: inline-block;">
            </div>
        </div>
                    
                </div>
            </div>
    
</section>
@endsection   
           


@section('title')
    英雄联盟
@endsection 
