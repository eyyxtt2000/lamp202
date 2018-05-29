@extends('Admin.layout.index')     
@section('content')     
       
        
             <!-- 内容开始 -->
            <div class="container">
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>{{ $title }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                   
         <table  cellspacing="0px"width="964px"  >
            <caption >   </caption>
            <tr bgcolor="#00FFFF">
                <th rowspan="2">
                    <img src="{{$data->profile}}"  class="img-circle img-thumbnail img-responsive" style="width:200px">
                </th>
               <th colspan="2">{{'姓名:'.$data->username}}</th>
            </tr>
              <tr>
                <th>身份</th>
                @if($data->identity==1)
                    <th colspan="2">管理员</th>
                 @else
                    <th colspan="2">用户</th>
                 @endif
            </tr>
            <tr>
                <th>状态</th>
                @if($data->usersdetail['status']==1)
                 <th colspan="2">激活状态</th>
                 @else
                    <th colspan="2">黑名单</th>
                 @endif
            </tr>
            <tr>
                <th>性别</th>
                <th>{{$data->usersdetail['sex']}}</th>
            </tr>
            <tr>
                <th >邮箱</th>
                <th colspan="2">{{$data->usersdetail['email']}}</th>
                
            </tr>
            <tr>
                <th>电话</th>
                <th colspan="2">{{$data->usersdetail['phone']}}</th>
            </tr>
            <tr>
                <th>地址</th>
                 <th colspan="2">{{$data->usersdetail['addr']}}</th>
            </tr>
           
             <tr>
                <th>积分</th>
                 <th colspan="2">{{$data->usersdetail['score']}}</th>
            </tr>
           
        </table>

                    </div>      
                </div>
            </div>
            <!-- 内容结束-->
                       
          

@endsection   

@section('title')
    英雄联盟
@endsection        
          
  