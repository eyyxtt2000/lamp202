@extends('Admin.layout.index')     
@section('content')  
        
            <!-- 内容开始 -->
            <div class="container">
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span > <i class="icon-magic"></i>{{ $title }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/articles" method="post">
                            {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">所属标签</label>
                                    <div class="mws-form-item">
                                        <select class="small" name="ftype">
                                            <option value="0" selected>生活</option>
                                            <option value="1">情感</option>
                                            <option value="2">军事</option>
                                            <option value="3">汽车</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">文章标题</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="title" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">文章内容</label>
                                    <div class="mws-form-item">
                                        <textarea class="small" name="content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="添加" class="btn btn-success">
                                <input type="reset" value="重置" class="btn btn-info">
                            </div>
              <div id="mydiv">
                <img src="/d/images/logo.png" alt="mws admin">
            </div>
                        </form>
                    </div>      
                </div>
            </div>
            <!-- 内容结束-->
                       
   
@endsection   
           
  

@section('title')
    英雄联盟
@endsection    
