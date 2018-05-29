@extends('Admin.layout.index')     
@section('content') 
<!-- 显示错误的信息-->
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
      <span > <i class="icon-magic"></i>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="{{url('admin/users')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

            <div class="mws-form-block">

             
                    <div class="mws-form-row ">
                                    <label class="mws-form-label">状态</label>
                                    <div class="mws-form-item">
                                        <select name="status" class="large">
                                            <option value="1">激活</option>
                                            <option value="0">未激活</option>
                                           
                                        </select>
                                   
                                </div>
               

                
<ul class="mws-form-list inline">
    身份:
    <li><input type="radio" checked="checked" name="identity" value='2'> <label>用户</label></li>
    <li><input type="radio" name="identity" value='1'> <label>管理员</label></li>
  
</ul>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名:</label>
                    <div class="mws-form-item">
                        <input type="text" name="username" class="small" placeholder="用户名" value="{{old('username')}}">
                    </div>
                </div>

                

                  <div class="mws-form-row">
                    <label class="mws-form-label">性别:</label>
                    <div class="mws-form-item">
                        <input type="text" name="sex" class="small" placeholder="性别" value="{{old('sex')}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">密码:</label>
                    <div class="mws-form-item">
                        <input type="password" name="password" class="small" placeholder="密码">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">确认密码:</label>
                    <div class="mws-form-item">
                        <input type="password" name="repassword" class="small" placeholder="确认密码">
                    </div>
                </div>
                
              

                <div class="mws-form-row">
                    <label class="mws-form-label">手机:</label>
                    <div class="mws-form-item">
                        <input type="text" name="phone" class="small" value="{{old('phone')}}" placeholder="手机号">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">邮箱:</label>
                    <div class="mws-form-item">
                        <input type="email" name="email" class="small" value="{{old('email')}}" placeholder="邮箱">
                    </div>
                </div>
                  <div class="mws-form-row">
                    <label class="mws-form-label">地址:</label>
                    <div class="mws-form-item">
                        <input type="text" name="addr" class="small" placeholder="地址" value="{{old('addr')}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">头像:</label>
                    <div class="mws-form-item">
                        <input type="file" name="profile" class="small">
                    </div>
                </div>
              
            </div>

            <div class="mws-button-row">
                <input type="submit" value="添加" class="btn btn-success">

                <input type="reset" value="重置" class="btn btn-info ">
            </div>
        <div id="mydiv">
                <img src="/d/images/logo.png" alt="mws admin">
            </div>
        </form>
    </div>
        </div>

   
@endsection   
           
  

@section('title')
    英雄联盟
@endsection          
           