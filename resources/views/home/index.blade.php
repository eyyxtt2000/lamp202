@extends('home.layout.index')
@section('content')
<section class="container pt-20">
    <!--<div class="Huialert Huialert-info"><i class="Hui-iconfont">&#xe6a6;</i>成功状态提示</div>-->
  <!--left-->
  <div class="col-sm-9 col-md-9">
    <!--滚动图-->
    <div class="slider_main">
            <div class="slider">
                <div class="bd">
                    <div class="tempWrap" style="overflow:hidden; position:relative; width:923px">
                    <ul style="width: 3692px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -923px;">

                        <li class="clone" style="float: left; width: 923px;"><a href="#" target="_blank"><img src="/homeblog/img/temp/banner8.png"></a></li>

                        <li style="float: left; width: 923px;"><a href="#" target="_blank"><img src="/homeblog/img/temp/banner1.jpg"></a></li>

                        <li style="float: left; width: 923px;"><a href="#" target="_blank"><img src="/homeblog/img/temp/banner8.png"></a></li>

                        <li class="clone" style="float: left; width: 923px;"><a href="#" target="_blank"><img src="/homeblog/blogimg/temp/banner1.jpg"></a></li>

                    </ul></div>
                </div>
                <ol class="hd cl dots">
                    <li class="active">1</li>
                    <li class="">2</li>
                </ol>
                <a class="slider-arrow prev" href="javascript:void(0)"></a>
                <a class="slider-arrow next" href="javascript:void(0)"></a>
            </div>
        </div>

        <div class="mt-20 bg-fff box-shadow radius mb-5">
            <div class="tab-category">
                <a href=""><strong class="current">最新发布</strong></a>
                <a href="/home/article" style="float:right;"><p style="line-height: 37px;">更多&gt;&gt;</p></a>
            </div>
        </div>
        <div class="art_content">
            <ul class="index_arc">
            <!--遍历最新文章开始-->
            @foreach( $articles_new as $k => $v )
                <li class="index_arc_item">
                    <a href="#" class="pic">
                        <img class="lazyload" data-original="temp/art.jpg" alt="应该选" src="{{ $v -> articles_image_path }}" style="display: inline-block;width:165px;height:110px;">
                    </a>
                    <h4 class="title"><a href="/home/articledetail/{{$v->id}}">{{$v->title}}</a></h4>
                    <div class="date_hits">
                        <span>{{$v->author}}</span>
                        <span>{{$v->created_at}}</span>
                        <span><a href="/home/article/{{ $v -> column -> id }}">{{$v -> column -> cname}}</a></span>
                        <p class="commonts"><i class="Hui-iconfont" title="点击量"></i> <span class="cy_cmt_count">{{ $v -> comment }}</span></p>
                    </div>
                    <div class="desc">{!! $v->content !!}</div>
                </li>
            @endforeach
            <!--遍历最新文章结束-->
            </ul>
        </div>
  </div>

  <!--right-->
  <div class="col-sm-3 col-md-3">

    <!--站点声明-->
        <div class="panel panel-default mb-20">
            <div class="panel-body">
                <i class="Hui-iconfont" style="float: left;">&nbsp;</i>
                <div class="slideTxtBox">
                    <div class="bd">
                        <div class="tempWrap" style="overflow:hidden; position:relative; height:19px"><ul style="top: 0px; position: relative; padding: 0px; margin: 0px;">
                            <li style="height: 19px;"><a href="javascript:void(0);">个人博客测试版上线，欢迎访问</a></li>
                            <li style="height: 19px;"><a href="javascript:void(0);">内容如有侵犯，请立即联系管理员删除</a></li>
                            <li style="height: 19px;"><a href="javascript:void(0);">仅提供学习开源，不做商业用途</a></li>
                        </ul></div>
                    </div>
                </div>
            </div>
        </div>

    <!--博主信息-->
        <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>博主们的信息</strong></a>
            </div>
            <div class="tab-category-item">
                <ul class="index_recd">
                    <li class="index_recd_item"><i class="Hui-iconfont"></i>团队人员：郑志民,刘富生,冯毅,杨宇星</li>
                    <li class="index_recd_item"><i class="Hui-iconfont"></i>专业：phpWeb前后端开发</li>
                    <li class="index_recd_item"><i class="Hui-iconfont"></i>邮箱：<a href="mailto:66******88@qq.com">66****88@qq.com</a></li>
                    <li class="index_recd_item"><i class="Hui-iconfont"></i>定位：北京 · 昌平</li>
                </ul>
            </div>
        </div>


    <!--热门推荐-->
        <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>热门推荐</strong></a>
            </div>
            <div class="tab-category-item">
                <ul class="index_recd">
                    @foreach($hot as $k => $v)
                    <li>
                        <a href="/home/articledetail/{{$v->id}}">{{ $v -> title}}</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> {{ $v -> comment}} </p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!--点击排行-->
        <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>点击排行</strong></a>
            </div>
            <div class="tab-category-item">
                <ul class="index_recd clickTop">
                    <li>
                        <a href="#">111AJAX的刷新和前进后退问题解决</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276° </p>
                    </li>
                    <li>
                        <a href="#">22222AJAX的刷新和前进后退问题解决</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276° </p>
                    </li>
                    <li>
                        <a href="#">33333AJAX的刷新和前进后退问题解决</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276° </p>
                    </li>
                    <li>
                        <a href="#">44444AJAX的刷新和前进后退问题解决</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276° </p>
                    </li>
                    <li>
                        <a href="#">5555AJAX的刷新和前进后退问题解决</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276° </p>
                    </li>
                    <li>
                        <a href="#">6666AJAX的刷新和前进后退问题解决</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276° </p>
                    </li>
                    <li>
                        <a href="#">7777AJAX的刷新和前进后退问题解决</a>
                        <p class="hits"><i class="Hui-iconfont" title="点击量"></i> 276° </p>
                    </li>
                </ul>
            </div>
        </div>

        <!--标签-->
        <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>标签云</strong></a>
            </div>
            <div class="tab-category-item">
                <div class="tags"> <a href="http://www.h-ui.net/" class="tags9">H-ui前端框架</a> <a href="http://www.h-ui.net/websafecolors.shtml" class="tags5">Web安全色</a> <a href="http://www.h-ui.net/Hui-4.4-Unslider.shtml" class="tags7">jQuery轮播插件</a> <a href="http://idc.likejianzhan.com/vhost/korea_hosting.php" class="tags1">韩国云虚拟主机</a> <a href="http://www.h-ui.net/bug.shtml" class="tags9">IEbug</a> <a href="http://www.h-ui.net/site.shtml" class="tags8">IT网址导航</a> <a href="http://www.h-ui.net/icon/index.shtml" class="tags8">网站常用小图标</a> <a href="http://www.h-ui.net/tools/jsformat.shtml" class="tags6">web工具箱</a> <a href="http://www.h-ui.net/bg/index.shtml" class="tags9">网站常用背景素材</a> <a href="http://www.h-ui.net/yuedu/chm.shtml" class="tags4">H-ui阅读</a> <a href="http://www.h-ui.net/easydialog-v2.0/index.html" class="tags7">弹出层插件</a> <a href="http://www.h-ui.net/SuperSlide2.1/demo.html" class="tags6">SuperSlide插件</a> <a href="http://www.h-ui.net/TouchSlide1.1/demo.html" class="tags0">TouchSlide</a></div>
            </div>
        </div>
        <!--图片-->
        <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>扫我关注</strong></a>
            </div>
            <div class="tab-category-item">
                <img data-original="temp/gg.jpg" class="img-responsive lazyload" alt="响应式图片" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC">
            </div>
        </div>

        <!--友情链接-->
        <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>隔壁邻居</strong></a>
            </div>
            <div class="tab-category-item">
                @foreach($friend as $k=> $v)
                <span><i class="Hui-iconfont"></i><a href="{{$v->friendly_https}}" class="btn-link">{{$v->title}}</a></span>
              @endforeach
            </div>
        </div>
        <!--最近访客-->
        <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>最近访客</strong></a>
            </div>
            <div class="panel-body">
                <ul class="recent">
              @foreach($var as $k=>$v)
                @foreach($v as $kk=>$vv)
                    <div class="item"><img style="width:40px;height:40px" src="{{$vv->profile}}" alt=""></div>
                @endforeach
             @endforeach
                </ul>
            </div>
        </div>

        <!--分享-->
        <div class="bg-fff box-shadow radius mb-20">
            <div class="tab-category">
                <a href=""><strong>站点分享</strong></a>
            </div>
            <div class="panel-body">
                <div class="bdsharebuttonbox Hui-share"><a href="#" class="bds_weixin Hui-iconfont" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone Hui-iconfont" data-cmd="qzone" title="分享到QQ空间"></a> <a href="#" class="bds_sqq Hui-iconfont" data-cmd="sqq" title="分享到QQ好友"></a> <a href="#" class="bds_tsina Hui-iconfont" data-cmd="tsina" title="分享到新浪微博"></a> <a href="#" class="bds_tqq Hui-iconfont" data-cmd="tqq" title="分享到腾讯微博"></a></div>
            </div>
        </div>




  </div>

</section>
@endsection



@section('title')
    英雄联盟
@endsection