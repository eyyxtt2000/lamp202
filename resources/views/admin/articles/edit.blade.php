
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
                   

                   
       
    
       
        
        <form class="mws-form" action="/admin/articles/{{$id}}" method="post" enctype="multipart/form-data"   style="margin-top: 20px;">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
<!-- <div class="mws-form-row">
<label class="mws-form-label">文章标题</label>
<div class="mws-form-item">
    <input type="text" name="title" class="small">
</div> -->
            <div class="mws-form-row">
                <label class="mws-form-label" for="title">文章标题 </label>
                <div class="mws-form-item">
                <input type="text" class="small" name="title" id="title" placeholder="title" value="{{$data->title}}">
                </div>
            </div>

              <div class="mws-form-row">
               <label class="mws-form-label" for="ctime">创建时间 </label> <div class="mws-form-item">
               <input type="text" class="small" name="ctime" id="ctime" placeholder="ctime" value="{{$data->ctime}}">
               </div>
           </div> 

              <div class="mws-form-row">
               <label class="mws-form-label" for="content">文章内容 </label> <div class="mws-form-item">
               <input type="text" class="small" name="content" id="content"  value="{{$data->content}}">
               </div>
           </div> 

             <div class="mws-form-row">
                <label class="mws-form-label" for="ftype">标签云 </label> 
               <div class="mws-form-item">
                       <select class="small" name="ftype">
                        <option value="0" @if($data->ftype==1) selected; @endif>生活</option>
                         <option value="1"  @if($data->ftype==1) selected @endif>情感</option>
                        <option value="2"  @if($data->ftype==2) selected @endif>军事</option>
                        <option value="3"  @if($data->ftype==3) selected @endif>汽车</option>
                       </select>
                   </div>
            </div>

             

            <button type="submit" class="btn btn-success ">提交</button>

            <div id="mydiv">
                <img src="/d/images/logo.png" alt="mws admin">
            </div>
            
        </form>
   
                    
                    
                    
                       
                  
                </div>
            </div>
            <!-- 内容结束-->
                       
@endsection   
           
  

@section('title')
    英雄联盟
@endsection  