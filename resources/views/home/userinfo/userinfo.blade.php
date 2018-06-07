@extends('home.layout.index')  


@section('content') 
<br><br>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
        <link rel="stylesheet" href="/homeuserinfo/css/common.css">
        <link rel="stylesheet" href="/homeuserinfo/css/shopsManager.css">
        <script type="text/javascript" src="/homeuserinfo/js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="/homeuserinfo/js/common.js"></script>
        <script type="text/javascript" src="/homeuserinfo/js/navTop.js"></script>
        <script type="text/javascript" src="/homeuserinfo/js/jquery.circliful.min.js"></script>
        <title>个人中心</title>
    </head>

    <body>



        <!-- 内容  开始-->
        <ul class="wrap">
            <ul class="vip_cont c100 clearfix">
                <!--左边列表导航  开始-->
                <ul class="fl vip_left vip_magLeft">
                    <dl>
                        <dt>我的账号</dt>
                        <dd>
                            <p><a href="javascript:;" >基本资料</a></p>
                           <!--  <p><a href="#" target="_blank">修改密码</a></p> -->
                        </dd>
                        <dd>
                            <p><a href="javascript:;" >我的收藏</a></p>
                           <!--  <p><a href="#" target="_blank">修改密码</a></p> -->
                        </dd>
                        <dd>
                            <p><a href="javascript:;" >修改密码</a></p>
                           <!--  <p><a href="#" target="_blank">修改密码</a></p> -->
                        </dd>
                    </dl>

                    <dl>
                        <dt>评论管理</dt>
                        <dd>
                            <p><a href="javascript:;" >我的私信</a></p>
                        </dd>
                        <dd>
                            <p><a  href="javascript:;" >我的评论</a></p>
                        </dd>
                    </dl>

                     <dl>
                        <dt>评论管理</dt>
                        <dd>
                            <p><a href="javascript:;" >我的私信</a></p>
                        </dd>
                        <dd>
                            <p><a  href="javascript:;" >我的评论</a></p>
                        </dd>
                    </dl>

                   

                </ul>
                <!--左边列表导航  结束-->

                <!--右边列表内容  开始-->
              
                    <!--用户信息  开始 一个div1对应一个dd -->
                    <div1 class="cus01">
                        <span class="cusImg">
                        <label for="test1">
                            <img id="pic" src="{{ session('homeuser')['profile'] }}" style="width:127px;height:127px" title="更换头像" /> 
                            <button type="button" style="display:none" class="layui-btn" id="test1" >隐藏了这个上传按钮 </button>
                        </label>
                           
                        </span>
                        
                      

                           <?php echo csrf_field(); ?>
                            <script src="/layui/layui.js"></script>
                            <script>
                            layui.use('upload', function(){
                              var upload = layui.upload;
                               //alert(upload);
                              //执行实例
                              var uploadInst = upload.render({
                                elem: '#test1' //绑定元素
                                ,method:'POST'
                                ,url: '/home/ler/uploads' //上传接口
                                ,data:{'_token':$('input[type=hidden]').eq(0).val()}
                                ,field:'profile'
                                ,done: function(res){
                                  //上传完毕回调
                                 if(res.code==1){

                                    layer.msg(res.msg);
                                    $("#pic").attr('src',res.data.src);
                                 } else{
                                    layer.msg(res.msg);
                                 }   
                                }
                               
                              });
                            });
                            </script>

                        <span class="cusName">
                            <p title="用户名称">用户名称1</p>
                            <span title="分众传媒有限公司">公司名称：分众传媒有限公司</span>
                            <span class="bdTell">账号绑定<i></i><em>187****3765</em></span>
                        </span>
                        <span class="cus02">
                        <li>
                            <p><span>原创作品</span><a href="#" target="_blank">去上传</a></p>
                            <span class="numbers"><font>36</font>个</span>
                        </li>
                        <li>
                            <p><span>媒体资源</span><a href="#" target="_blank">去上传</a></p>
                            <span class="numbers"><font>6</font>套</span>
                        </li>
                        <li>
                            <p><span>个人资料</span><a href="#" target="_blank">去完善</a></p>
                        </li>
                    </span>

                    </div1>

                     <div1 class="cus01">
                        <span class="cusImg">
                            <img src="/homeuserinfo/images/customerImg.png" title="更换头像" />
                        </span>
                        <span class="cusName">
                            <p title="用户名称">用户名称2</p>
                            <span title="分众传媒有限公司">公司名称：分众传媒有限公司</span>
                            <span class="bdTell">账号绑定<i></i><em>187****3765</em></span>
                        </span>
                    </div1>

                     <div1 class="cus01">
                        <span class="cusImg">
                            <img src="/homeuserinfo/images/customerImg.png" title="更换头像" />
                        </span>
                        <span class="cusName">
                            <p title="用户名称">用户名称3</p>
                            <span title="分众传媒有限公司">公司名称：分众传媒有限公司</span>
                            <span class="bdTell">账号绑定<i></i><em>187****3765</em></span>
                        </span>
                    </div1>

                       <div1 class="cus01">
                        <span class="cusImg">
                            <img src="/homeuserinfo/images/customerImg.png" title="更换头像" />
                        </span>
                        <span class="cusName">
                            <p title="用户名称">用户名称4</p>
                            <span title="分众传媒有限公司">公司名称：分众传媒有限公司</span>
                            <span class="bdTell">账号绑定<i></i><em>187****3765</em></span>
                        </span>
                    </div1>

                       <div1 class="cus01">
                        <span class="cusImg">
                            <img src="/homeuserinfo/images/customerImg.png" title="更换头像" />
                        </span>
                        <span class="cusName">
                            <p title="用户名称">用户名称5</p>
                            <span title="分众传媒有限公司">公司名称：分众传媒有限公司</span>
                            <span class="bdTell">账号绑定<i></i><em>187****3765</em></span>
                        </span>
                    </div1>
                 
                            <script>
                            var dd = document.getElementsByTagName('dd');
                            var div = document.getElementsByTagName('div1');
                            for(var i = 0;i<dd.length;i++){
                                dd[i].index = i; //给每个li的index属性赋值
                                dd[i].onclick = function(){
                                   
                                    var n = this.index;//获取当前li标签的下标
                                    // 让所有的div都隐藏
                                    for(var k = 0 ;  k<div.length;k++){
                                        div[k].style.display = 'none';
                                       
                                    }
                                    // 让指定的div显示
                                     div[n].style.display = 'block';
                                }


                               
                            }

                            </script>
                           
                     
                    <!-- 用户信息  结束 -->
                    
                

                <!--右边列表内容  结束-->
            </ul>
        </ul>

        <!-- 内容  结束-->


    </body>



