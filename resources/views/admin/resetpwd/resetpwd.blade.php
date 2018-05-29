@extends('Admin.layout.index')     
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
                   

                   
       
    
       
        
        <form class="mws-form" action="/admin/resetpwd/{{$id}}" method="post" enctype="multipart/form-data"   style="margin-top: 20px;">
        {{ csrf_field() }}
       

           

          <div class="mws-form-row">
               <label class="mws-form-label" for="oldpwd">原密码 </label> 
               <div class="mws-form-item">
                  <input type="text" class="small" name="oldpwd" id="oldpwd"  value="">
               </div>
           </div>

            <div class="mws-form-row">
               <label class="mws-form-label" for="newpwd">新密码 </label> 
               <div class="mws-form-item">
                  <input type="text" class="small" name="newpwd" id="newpwd"  value="">
               </div>
           </div>

            <div class="mws-form-row">
               <label class="mws-form-label" for="confirmpwd">确认新密码 </label> 
               <div class="mws-form-item">
                  <input type="text" class="small" name="confirmpwd" id="confirmpwd"  value="">
               </div>
           </div>  

            
             

            <button type="submit" class="btn btn-warning " style="padding:10px;margin-left:180px">修改</button>
            <button type="reset" class="btn btn-info" style="padding:10px; margin-left:50px">重置</button>

            <div id="mydiv">
                <img src="/admin/images/logo.png" alt="mws admin">
            </div>
            
        </form>
   
                    
                    
                    
                       
                  
                </div>
            </div>
            <!-- 内容结束-->
@endsection   

@section('title')
    英雄联盟
@endsection 