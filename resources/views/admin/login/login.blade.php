<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>后台登录页面</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="/h/bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/h/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="/h/css/app.css" type="text/css" />
</head>
<body background="/h/images/bodybg.jpg">
<section id="content" class="m-t-lg wrapper-md animated fadeInUp ">
    <div class="container aside-xl" style="margin-left: 500px;">
        <a class="navbar-brand block"><span class="h1 font-bold" style="color: #ffffff">管理员后台登录</span></a>
        <section class="m-b-lg">
            <header class="wrapper text-center">
                <strong class="text-sucess">管理员登录</strong>
            </header>
            <form action="/admin/dologin" method="post" >
            {{ csrf_field()}}
                <div class="form-group">
                    <input style="width:360px" type="username" name="username" placeholder="用户名" class="form-control  input-lg text-center no-border" value="{{old('username')}}">
                </div>
                <br>

                <div class="form-group">
                    <input style="width:360px" type="password" name="password" placeholder="密码" class="form-control  input-lg text-center no-border" >
                </div>
                <br>

                <button type="submit" class="btn btn-lg btn-danger lt b-white b-2x btn-block" id="validate-submit">
                    <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">登录</span></button>
            </form>
        </section>
    </div>
</section>
<!-- footer -->
<footer id="footer">
    <div class="text-center padder">

    </div>
</footer>
<!-- / footer -->

</body>
</html>
