@extends('admin.layout.index')
@section('content')


             <!-- 内容开始 -->
            <div class="container">
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>{{ $title }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">

         <table  cellspacing="0px"width="953.2px" height="605px"  style="background: url('/homeblog/temp/big.jpg'); " >
           
            <tr >
              
                <th  height="50px" rowspan="2">
                    <img src="{{$data->profile}}"  class="img-circle img-thumbnail img-responsive" style="width:127px;height:127px">
                </th>
               <th height="50px"  colspan="2"><font style="font-family:STFangsong" color="#006600"  size="5">{{'姓名:'.$data->username}}</font></th>
              
            </tr>

              <tr >
                <th ><font style="font-family:STFangsong" color="#006600"  size="4">身份</font></th>
                @if($data->identity==1)
                    <th  colspan="2"><font style="font-family:STFangsong" color="#006600"  size="4">管理员</font></th>
                 @else
                    <th   colspan="2"><font style="font-family:STFangsong" color="#006600"  size="4">用户</font></th>
                 @endif
            </tr>
            <tr>
                <th ><font style="font-family:STFangsong" color="#006600"  size="4">状态</font></th>
                @if($data->usersdetail['status']==1)
                 <th  colspan="2"><font style="font-family:STFangsong" color="#006600"  size="4">激活状态</font></th>
                 @else
                    <th   colspan="2"><font style="font-family:STFangsong" color="#006600"  size="4">黑名单</font></th>
                 @endif
            </tr>
            <tr>
                <th  height="50px" ><font style="font-family:STFangsong" color="#006600"  size="4">性别</font></th>
                <th  height="50px" ><font style="font-family:STFangsong" color="#006600"  size="4">{{$data->usersdetail['sex']}}</font></th>
            </tr>
            <tr>
                <th   ><font style="font-family:STFangsong" color="#006600"  size="4">邮箱</font></th>
                <th   colspan="2"><font style="font-family:STFangsong" color="#006600"  size="4">{{$data->usersdetail['email']}}</font></th>

            </tr>
            <tr>
                <th height="50px" ><font style="font-family:STFangsong" color="#006600"  size="4">电话</font></th>
                <th height="50px"  colspan="2"><font style="font-family:STFangsong" color="#006600"  size="4">{{$data->usersdetail['phone']}}</font></th>
            </tr>
            <tr>
                <th ><font style="font-family:STFangsong" color="#006600"  size="4">地址</font></th>
                 <th colspan="2"><font style="font-family:STFangsong" color="#006600"  size="4">{{$data->usersdetail['addr']}}</font></th>
            </tr>

             <tr>
                <th  height="50px" ><font style="font-family:STFangsong" color="#006600"  size="4">积分</font></th>
                 <th  height="50px" colspan="2"><font style="font-family:STFangsong" color="#006600"  size="4">{{$data->usersdetail['score']}}</font></th>
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

