<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Untitled</title>
       
       
    </head>
    <body>
        
       <h2>亲爱的{{$email}}</h2>
       <br>
      <p>感谢注册我们的账号</p>
      <br>
      <p>你的登录邮箱为:{{$email}},请点击以下链接激活账号,以便接收重要的提醒信息:</p>
      <br>
      <a href="http://www.lamp202.com/home/jihuo?id={{$id}}&token={{$token}}">http://www.lamp202.com/home/jihuo?id={{$id}}&token={{$token}}</a>
    </body>
</html>