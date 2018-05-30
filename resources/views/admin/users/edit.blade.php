@extends('admin.layout.index')
@section('content')
<!-- 内容开始 -->
<div class="container">
    @if(session('error'))
    <div class="mws-form-message error">
       {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="mws-form-message success">
         {{ session('success') }}
    </div>
    @endif

   <div class="mws-panel grid_8">
      <div class="mws-panel-header">
        <span>
         <span > <i class="icon-magic"></i>{{ $title }}</span>
      </div>
      <div class="mws-panel-body no-padding">
 <form class="mws-form" action="{{url('admin/users')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

            <div class="mws-form-block">
                <div class="mws-form-row" style="width: 800px;">
                    <label class="mws-form-label">状态</label>
                      <div class="mws-form-item">
                          <select name="status" class="large">
                          @if($data->usersdetail['status']==1)
                              <option selected value="{{$data2->status}}">激活</option>
                              <option value="0">未激活</option>
                            @else
                              <option value="1">激活</option>
                              <option selected  value="{{$data2->status}}">黑名单</option>
                            @endif
                          </select>
                    </div>
                    <ul class="mws-form-list inline" style="margin-bottom: -10px;">
                        身份:
                        @if($data->identity==2)
                        <li><input type="radio" checked="checked" name="identity" value='{{$data->identity}}'> <label>用户</label></li>

                        <li><input type="radio" name="identity" value='1'> <label>管理员</label></li>
                        @else
                        <li><input type="radio" checked="checked" name="identity" value='{{$data->identity}}'> <label>管理员</label></li>

                        <li><input type="radio" name="identity" value='2'> <label>用户</label></li>

                        @endif
                    </ul>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label" for="username">用户名</label>
                    <div class="mws-form-item">
                    <input type="text" class="small" name="username" id="username" placeholder="username" value="{{$data->username}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label" for="sex">性别</label>
                    <div class="mws-form-item">
                    <input type="text" class="small" name="sex" id="username" placeholder="sex" value="{{$data2->sex}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label" for="phone">电话</label>
                    <div class="mws-form-item">
                      <input type="text" class="small" name="phone" id="phone" placeholder="phone" value="{{ $data2->phone }}">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label" for="email">邮箱</label>
                    <div class="mws-form-item">
                      <input type="text" class="small" name="email" id="email" placeholder="email" value="{{ $data2->email }}">
                    </div>
                </div>

                <div class="mws-form-row">

                <label class="mws-form-label" for="score">积分</label>
                  <div class="mws-form-item">
                    <input type="text" class="small" name="score" id="score" placeholder="score" value="{{ $data2->score }}">
                  </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label" for="addr">地址</label>
                    <div class="mws-form-item">
                      <input type="text" class="small" name="addr" id="addr" placeholder="addr" value="{{ $data2->addr }}">
                    </div>
                </div>

                <div class="mws-form-row" style="width: 800px;">
                  <label class="mws-form-label" for="profile">头像</label>
                  <div class="mws-form-item">
                    <input type="file" class="small" name="profile" id="profile"><span></span>
                  </div>
                </div>

            </div>

            <div class="mws-button-row">
                <input type="submit" value="修改" class="btn btn-warning">
            </div>
        </form>
      </div>
    </div>
            <!-- 内容结束-->
@endsection

@section('title')
    英雄联盟
@endsection