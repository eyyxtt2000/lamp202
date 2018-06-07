
<!DOCTYPE HTML>
<html>
<title>留言板 — 个人博客</title>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="keywords" content="个人博客,王风宇个人博客,个人博客系统,老王博客,王风宇">
<meta name="description" content="Lao王博客系统，一个站在java开发之路上的草根程序员个人博客网站。">
<LINK rel="Bookmark" href="favicon.ico" >
<LINK rel="Shortcut Icon" href="favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/staticRes/js/html5shiv.js"></script>
<script type="text/javascript" src="/staticRes/js/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/homeblog/plugin/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/homeblog/plugin/Hui-iconfont/1.0.8/iconfont.min.css" />
<link rel="stylesheet" type="text/css" href="/homeblog/css/common.css" />
<link rel="stylesheet" type="text/css" href="/homeblog/plugin/pifu/pifu.css" />
<link rel="stylesheet" type="text/css" href="/homeblog/plugin/wangEditor/css/wangEditor.min.css">
<!--[if lt IE 9]>
<link href="/staticRes/lib/h-ui/css/H-ui.ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } function showSide(){$('.navbar-nav').toggle();}</script>
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
                    <li class="active"> <a href="/" data-hover="首页">首页</a> </li>
<<<<<<< HEAD
          <li> <a href="/home/about" data-hover="关于我们">关于我们</a> </li>
          <li> <a href="/home/mood" data-hover="妙语连珠">妙语连珠</a> </li>
          <li><a href="/home/article" data-hover="文章阅读">文章阅读</a></li>
          <li> <a href="/home/board" data-hover="留言板">留言板</a> </li>
=======
                    <li> <a href="/home/about" data-hover="关于我们">关于我们</a> </li>
                    <li> <a href="/home/mood" data-hover="妙语连珠">妙语连珠</a> </li>
                    <li><a href="/home/article" data-hover="文章阅读">文章阅读</a></li>
                    <li> <a href="/home/board" data-hover="留言板">留言板</a> </li>
>>>>>>> origin/zzm
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


                           <a  href="/home/userinfo/userinfo" ><img class="avatar radius"  src="{{ session('homeuser')['profile'] }}"  alt="博客"></a>
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
                                        area: ['300px', '195px'],
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

<!--导航条-->
<nav class="breadcrumb">
    <div class="container"> <i class="Hui-iconfont">&#xe67f;</i> <a href="inex.html" class="c-primary">首页</a> <span class="c-gray en">&gt;</span>  <span class="c-gray">留言板</span> </div>
    <div class="container"> <i class="Hui-iconfont">&#xe67f;</i> <a href="/" class="c-primary">首页</a> <span class="c-gray en">&gt;</span>  <span class="c-gray">留言板</span> </div>
</nav>

<section class="container">
    <div class="col-xs-12 col-md-10 col-md-offset-1 mt-20">
        <!--用于评论-->
        <div class="mt-20" id="ct">
         <!--   <div id="err" class="Huialert Huialert-danger hidden radius">成功状态提示</div> -->




          <div class="row">
                          <div class="col-md-2"><img src="/homeblog/img/left.gif"></div>

                          <div class="col-md-10" name="comment" style="height:280px" ><!-- 加载编辑器的容器 -->
                                        <script id="container" name="content" type="text/plain" style="height:210px">
                                            这里写你的初始化内容
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
                                        </div>
                          <div class="col-md-0">

                          </div>
             </div>





          <div class="text-r mt-8">
              <button onclick="getPlainTxt()" class="btn btn-primary radius" > 发表评论</button>
          </div>

        </div>

        <div class="line"></div>

        <ul class="commentList mt-50">

          <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://q.qlogo.cn/qqapp/101388738/1CF8425D24660DB8C3EBB76C03D95F35/100"></i></a>
                <div class="comment-main">
                    <header class="comment-header">
                        <div class="comment-meta"><a class="comment-author" href="#">老王</a>
                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20" class="f-r">2014-8-31 15:20</time>
                        </div>
                    </header>
                    <div class="comment-body">
                        你是猴子派来的救兵吗？

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

                        <button class="hf f-r btn btn-default size-S mt-10" name="2">回复</button>

                    </div>
                </div>
            </li>
            <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://qzapp.qlogo.cn/qzapp/101388738/1CF8425D24660DB8C3EBB76C03D95F35/100"></i></a>
                <div class="comment-main">
                    <header class="comment-header">
                        <div class="comment-meta"><a class="comment-author" href="#">老王</a>
                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20" class="f-r">2014-8-31 15:20</time>
                        </div>
                    </header>
                    <div class="comment-body">
                        你是猴子派来的救兵吗？

                        <button class="hf f-r btn btn-default size-S mt-10" name="3">回复</button>

                    </div>
                </div>
            </li>

        </ul>
        <!--用于回复-->
        <div class="comment hidden mt-20">
            <div id="err2" class="Huialert Huialert-danger hidden radius">成功状态提示</div>
            <textarea class="textarea" style="height:100px;" > </textarea>
            <button onclick="hf(this);" type="button" class="btn btn-primary radius mt-10">回复</button>
            <a class="cancelReply f-r mt-10">取消回复</a>
        </div>
        <!--隐藏不需要的文本框开始-->
            <div style="display:none">
                 <div id="textarea1"style="display:none;" ></div>

            </div>
        <!--隐藏不需要的文本框结束-->

    </div>


</section>
<footer class="footer mt-20">
    <div class="container-fluid" id="foot">
        <p>Copyright &copy; 2016-2017 www.wfyvv.com <br>
            <a href="#" target="_blank">皖ICP备17002922号</a>  更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a><br>
        </p>
    </div>
</footer>
<script type="text/javascript" src="/homeblog/plugin/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/homeblog/plugin/layer/3.0/layer.js"></script>
<script type="text/javascript" src="/homeblog/plugin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/homeblog/plugin/pifu/pifu.js"></script>
<script type="text/javascript" src="/homeblog/js/common.js"></script>
<script> $(function(){ $(window).on("scroll",backToTopFun); backToTopFun(); }); </script>
<script type="text/javascript" src="/homeblog/plugin/wangEditor/js/wangEditor.min.js"></script>

<script type="text/javascript">
    $(function () {
        wangEditor.config.printLog = false;
        var editor1 = new wangEditor('textarea1');
        editor1.config.menus = ['insertcode', 'quote', 'bold', '|', 'img', 'emotion', '|', 'undo', 'fullscreen'];
        editor1.config.emotions = { 'default': { title: '老王表情', data: 'plugin/wangEditor/emotions1.data'}, 'default2': { title: '老王心情', data: 'plugin/wangEditor/emotions3.data'}, 'default3': { title: '顶一顶', data: 'plugin/wangEditor/emotions2.data'}};
        editor1.create();

        //show reply
        $(".hf").click(function () {
            pId = $(this).attr("name");
            $(this).parents(".commentList").find(".cancelReply").trigger("click");
            $(this).parent(".comment-body").append($(".comment").clone(true));
            $(this).parent(".comment-body").find(".comment").removeClass("hidden");
            $(this).hide();
        });
        //cancel reply
        $(".cancelReply").on('click',function () {
            $(this).parents(".comment-body").find(".hf").show();
            $(this).parents(".comment-body").find(".comment").remove();
        });
    });

</script>

</body>
</html>
