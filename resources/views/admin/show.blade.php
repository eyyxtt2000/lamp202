<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="/store" method="post" >
    {{ csrf_field()}}
        
        <h1>代码部分</h1>
        
        <div style="width:20px">
            <img src="/code" onclick="rand(this)" title="点击切换验证码">
        </div>
        
        <br>
        验证码:<input type="text" name="code" >
        <input type="submit" value="提交" placeholder="">

    </form>
    <script type="text/javascript">
     function rand(obj)
     {
          obj.src='/code'+'?a='+Math.random();
     }

 </script> 
    
</body>
</html>
