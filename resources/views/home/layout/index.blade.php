
<!DOCTYPE HTML>
<html>

<head>
<title>老王个人博客 — 一个站在java开发之路上的草根程序员个人博客网站</title>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="keywords" content="个人博客,王风宇个人博客,个人博客系统,老王博客,王风宇">
<meta name="description" content="Lao王博客系统，一个站在java开发之路上的草根程序员个人博客网站。">
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

<!--[if lt IE 9]>
<link href="/staticRes/lib/h-ui/css/H-ui.ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } function showSide(){$('.navbar-nav').toggle();}
</script>

</head>
<body>










<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container cl">
            <a class="navbar-logo hidden-xs" href="index.html">
                <img class="logo" src="/homeblog/img/logo.png" alt="Lao王博客" />
            </a>
            <a class="logo navbar-logo-m visible-xs" href="index.html">Lao王博客</a>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:void(0);" onclick="showSide();">&#xe667;</a>
            <nav class="nav navbar-nav nav-collapse w_menu" role="navigation">
                <ul class="cl">
                    <li class="active"> <a href="/home/index" data-hover="首页">首页</a> </li>
                    <li> <a href="/home/about" data-hover="关于我们">关于我们</a> </li>
                    <li> <a href="/home/mood" data-hover="妙语连珠">妙语连珠</a> </li>
                    <li><a href="/home/article" data-hover="文章阅读">文章阅读</a></li>
                    <li> <a href="/home/board" data-hover="留言板">留言板</a> </li>
                </ul>
            </nav>
            <nav class="navbar-nav navbar-userbar hidden-xs hidden-sm " style="top: 0;">
                <ul class="cl">
                    <li class="userInfo dropDown dropDown_hover">
                            <a href="javascript:;" ><img class="avatar radius" src="/homeblog/img/40.jpg" alt="丶似浅 "></a>
                            <ul class="dropDown-menu menu radius box-shadow">
                                <li><a href="/app/loginOut">退出</a></li>
                            </ul>
                            <a href="/app/qq" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" ><img class="avatar size-S" src="/homeblog/img/qq.jpg" title="登入">登入</a>
                    </li>
                </ul>
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
