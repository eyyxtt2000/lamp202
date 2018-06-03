<!DOCTYPE html>
<html>
	
<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>登录界面</title>
		<link rel="stylesheet" href="/homelog/login/css/reset.css" />
		<link rel="stylesheet" href="/homelog/login/css/common.css" />
		<link rel="stylesheet" href="/homelog/login/css/font-awesome.min.css" />
		<style type="text/css">
			#u{
					width:158px;
					height:28px;
					line-height:26px;
					padding-left:10px;/*这里的值可以改变光标的位置*/
					
				}
			
				
			
		</style>
	</head>
	<body>
		<div class="wrap login_wrap">
			<div class="content">
				<div class="logo"></div>
				<div class="login_box">	
					
					<div class="login_form">
						<div class="login_title">
							登录
						</div>
						<form action="/home/login/dologin" method="post">
							{{csrf_field()}}
							
							<div class="form_text_ipt">
								<input name="username" id="u" type="text" value="{{ old('username') }}" placeholder="账号" ><span id="span1"></span>
							</div>
							
							
							
							<div class="form_text_ipt">
								<input name="password" type="password" value="" id="p" placeholder="密码"><span id="span2"> </span>
							</div>
							
							<div class="form_check_ipt">
								<div class="left check_left">
									<label><input name="" type="checkbox"> 下次自动登录</label>
								</div>
								<div class="right check_right">
									<a href="#">忘记密码</a>
								</div>
							</div>
							<div class="form_btn">
								<button type="submit" onclick="return zzmcheck()" >登录</button>
							</div>
							<div class="form_reg_btn">
								<span>还没有帐号？</span><a href="{{url('/home/login/register')}}">马上注/册</a>
							</div>
						</form>
						<div class="other_login">
							<div class="left other_left">
								<span>其它登录方式</span>
							</div>
							<div class="right other_right">
								<a href="#"><i class="fa fa-qq fa-2x"></i></a>
								<a href="#"><i class="fa fa-weixin fa-2x"></i></a>
								<a href="#"><i class="fa fa-weibo fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

	</body>
</html>
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/ajax3.0-min.js"></script>
<script>
	window.onload = function(){
	var oInput = document.getElementById("u");
	oInput.focus();
	}//设置光标初始位置一直在用户名位置目的是为了ajax失去焦点事件

	var userFlag=false;
	var passwordFlag=false;
	$('#u').blur(function(event) {
		var uname=$('#u').val();
		//console.log(uname);
		
		$.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
					});
		$.post('/home/ajax1',{'username':uname},function(msg){
	
			if(msg==1)
			{
				$("#span1").text('欢迎回来请填写密码');
				userFlag=true;

			}else{

				$("#span1").text('请填写正确的用户名');
				userFlag=false;

			}
		})
	});
	   
	   function zzmcheck()
		{
			var abc = $(" input[ name='password' ] ").val();
			
			 if(!abc=='')
				  {
				  	passwordFlag=true;
				  }
				  else{
				  	passwordFlag=false;
				  }
			

			 if(userFlag && passwordFlag)
					{	
						return true;
					}else{
						return false;
					}
			
		 }

	
//--------------new Array()

//----------------------------------------
	
	  
	
</script>

