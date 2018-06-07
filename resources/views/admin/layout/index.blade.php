
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/demo.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/page.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/themer.css" media="screen">
    <link href="/logo/2.png" type="image/x-iocn" rel="shortcut icon" />
    <link rel="stylesheet" href="/layui/css/layui.css">
<title>@yield('title')</title>
<style type="text/css">
    .page ul,.page li{
        list-style-type: none;
    }

    .page li{
        float: left;
        height: 20px;
        padding: 0 10px;
        display: block;
        font-size: 12px;
        line-height: 20px;
        text-align: center;
        cursor: pointer;
        outline: none;
        background-color: #444444;
        color: #fff;
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
        color:#fff;
    }

    .page .active{
        background: #c5d52b;
        color:#323232;
    }

    .page .disabled{
            color: #666666;
            cursor: default;
    }
      #mydiv{
        float:right;
    }

</style>
</head>

<body>



    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="/admin/images/logo.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            
           
            <!-- 用户信息 and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- 用户头像 -->
                @if( session('adminUser') )
            
            <div id="mws-user-photo">
                <img style="width:32px;height:32px" src="{{$user = session('adminUser')->profile}}" alt="">
            </div>
            @else
            <div id="mws-user-photo">
                <img src="/admin/example/profile.jpg" alt="User Photo">
            </div>
            @endif 
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                    @if( session('adminUser') )
                       {{'你好'.','.$user = session('adminUser')->username}}
                     @else
                        Hello, 用户
                     @endif
                    </div>
                    <ul>
                        <li><a href="#">头像</a></li>
                        <li><a href="/admin/repwd">修改密码</a></li>
                        <li><a href="/admin/logout">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->
            <div id="mws-searchbox" class="mws-inset">
                <form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" onclick="return false"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    
                    <li class="active">
                        <a href="#"><i class="icon-list"></i> 文章管理</a>
                        <ul>
                            <li><a href="/admin/articles">文章列表</a></li>
                            <li><a href="/admin/articles/create">文章添加</a></li>
                        </ul>
                    </li>

                     <li class="active">
                        <a href="#"><i class="icon-list"></i>栏目管理</a>
                        <ul>
                            <li><a href="/admin/column">栏目列表</a></li>
                            <li><a href="/admin/column/create">栏目添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-user"></i> 用户管理</a>
                        <ul>
                            <li><a href="/admin/users">用户列表</a></li>
                            <li><a href="/admin/users/create">用户添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>友情链接</a>
                        <ul>
                            <li><a href="/admin/friendlylink">链接列表</a></li>
                            <li><a href="/admin/friendlylink/create">链接添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>广告位</a>
                        <ul>
                            <li><a href="/admin/advertise">广告列表</a></li>
                            <li><a href="/admin/advertise/create">广告添加</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- 内容开始-->
        <div id="mws-container" class="clearfix"> 
            <!-- 内容开始 -->
            <div class="container">
            @section('content')
            @show
            </div>
            <!-- 内容结束-->   
        </div>
        <div id="mws-footer">
            Copyright Your Website 2012. All Rights Reserved.
        </div>
        <!-- 内容结束 -->
     </div>   
         <!-- Footer -->
        
    <!-- JavaScript Plugins -->
    <script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admin/plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/layui/layui.all.js"></script>

</body>
</html>
