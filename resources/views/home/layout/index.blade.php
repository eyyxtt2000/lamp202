
<!DOCTYPE HTML>
<html>

<head>
<title>个人博客</title>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="keywords" content="个人博客">
<meta name="description" content="程序员个人博客网站。">
<LINK rel="Bookmark" href="/homeblog/favicon.ico" >
<LINK rel="Shortcut Icon" href="/homeblog/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/staticRes/js/html5shiv.js"></script>
<script type="text/javascript" src="/staticRes/js/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/homeblog/plugin/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/homeblog/plugin/Hui-iconfont/1.0.8/iconfont.min.css" />
<link rel="stylesheet" type="text/css" href="/homeblog/css/common.css" />
<link rel="stylesheet" type="text/css" href="/homeblog/plugin/pifu/pifu.css" />
<link rel="stylesheet" type="text/css" href="/homeblog/css/timeline.css">
<link rel="stylesheet" type="text/css" href="/admin/css/page.css" media="screen">
<!--引入layer弹窗开始做登录-->
<link href="/layui/css/layui.css" rel="stylesheet" type="text/css" />

<!--引入layer弹窗结束做登录-->
<style type="text/css">
    .page ul,.page li{
        list-style-type: none;
    }
    .page li{
        float: left;
        height: 40px;
        padding: 0 12px;
        display: block;
        font-size: 16px;
        font-weight:bold;
        line-height: 40px;
        text-align: center;
        margin-top:40px;
        cursor: pointer;
        outline: none;
        background-color: #eee;
        color: #333;
        text-decoration: none;
        border-right: 1px solid #232323;
        border-left: 1px solid #666666;
        border-right: 1px solid rgba(0, 0, 0, 0.5);
        border-left: 1px solid rgba(255, 255, 255, 0.15);
        -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
    }

    .page a{
        color:#333;
    }

    .page .active{
        background: #c5d52b;
        color:#323232;
    }

    .page .disabled{
            color: #bbb;
            cursor: default;
    }
      #mydiv{
        float:right;
    }

</style>

<!--[if lt IE 9]>
<link href="/staticRes/lib/h-ui/css/H-ui.ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } function showSide(){$('.navbar-nav').toggle();}
</script>

<!--引入layer弹窗开始做登录-->
<script src="/homelog/layui/layui.all.js"></script>
<script>
//初始化layer一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;

  layer.msg('Hello World');
});


</script>
<!--引入layer弹窗结束做登录-->

</head>
<body>


<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container cl">
            <a class="navbar-logo hidden-xs" href="/">
                <img class="logo" src="/homeblog/img/logo.png" alt="个人博客" />
            </a>
            <a class="logo navbar-logo-m visible-xs" href="index.html">个人博客</a>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:void(0);" onclick="showSide();">&#xe667;</a>
            <nav class="nav navbar-nav nav-collapse w_menu" role="navigation">
                <ul class="cl">
                    <li class="active"> <a href="/" data-hover="首页">首页</a> </li>
                    <li> <a href="/home/about" data-hover="关于我们">关于我们</a> </li>
                    <li> <a href="/home/mood" data-hover="妙语连珠">妙语连珠</a> </li>
                    <li><a href="/home/article" data-hover="文章阅读">文章阅读</a></li>
                    <li> <a href="/home/board" data-hover="留言板">留言板</a> </li>
                </ul>
            </nav>
            <nav class="navbar-nav navbar-userbar hidden-xs hidden-sm " style="top: 0;">
                <ul class="cl">
                    <li class="userInfo dropDown dropDown_hover">

                     @if( session('homeuser') )

            <?php
              date_default_timezone_set('Asia/Shanghai');
              $h=date("H");
              if($h<11) echo "早上好!";
              else if($h<13) echo "中午好！";
              else if($h<17) echo "下午好！";
              else echo "晚上好！";

              ?>

                              {{session('homeuser')['username']}}


                           <a href="/home/userinfo/userinfo" ><img class="avatar radius"  src="{{ session('homeuser')['profile'] }}"  alt="博客"></a>
                           <ul class="dropDown-menu menu radius box-shadow">
                               <li><a href="/home/logout">退出</a></li>
                           </ul>
                    @else

                             <a href="#" onclick="return tan()" ><img class="avatar size-S" src="/homeblog/img/qq.jpg" title="登入">登入</a>
                     @endif


                    </li>
                </ul>
                  <script type="text/javascript">


                            function tan()
                            {
                                    var index = layer.open({
                                        type: 2,

                                        content: '/home/login/login',
                                        area: ['600px', '500px'],
                                        title: false,
                                        maxmin: true,
                                        closeBtn: 0
                                                });


                                layer.full(index);
                            }



                            </script>
            </nav>
        </div>
    </div>
</header>

 <!-- 内容开始 -->

            @section('content')
            @show

            <!-- 内容结束-->


<footer class="footer mt-20">
    <div class="container-fluid" id="foot">
        <p>Copyright &copy; 2016-2017 www.wfyvv.com <br>
            <a href="#" target="_blank">皖ICP备17002922号</a>
        </p>
    </div>
</footer>















<script type="text/javascript" src="/homeblog/plugin/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/homeblog/plugin/layer/3.0/layer.js"></script>
<script type="text/javascript" src="/homeblog/plugin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/homeblog/plugin/pifu/pifu.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script> $(function(){ $(window).on("scroll",backToTopFun); backToTopFun(); }); </script>
<script type="text/javascript" src="/homeblog/plugin/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="/homeblog/js/common.js"></script>

<script>
$(function(){
//幻灯片
jQuery(".slider_main .slider").slide({mainCell: ".bd ul", titCell: ".hd li", trigger: "mouseover", effect: "leftLoop", autoPlay: true, delayTime: 700, interTime: 2000, pnLoop: true, titOnClassName: "active"})
//tips
jQuery(".slideTxtBox").slide({titCell: ".hd ul", mainCell: ".bd ul", autoPage: true, effect: "top", autoPlay: true});
//标签
    $(".tags a").each(function(){
        var x = 9;
        var y = 0;
        var rand = parseInt(Math.random() * (x - y + 1) + y);
        $(this).addClass("tags"+rand)
    });

    $("img.lazyload").lazyload({failurelimit : 3});
});

</script>

</body>
</html>
