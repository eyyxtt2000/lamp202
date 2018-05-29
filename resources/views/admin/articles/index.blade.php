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
                      <i class="icon-table"></i>{{ $title }}</span>
                  </div>
                  <div class="mws-panel-body no-padding">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                      <div id="DataTables_Table_1_length" class="dataTables_length">
                        <label>显示
                          <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1">
                            <option value="10" selected="selected">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option></select>条</label>
                      </div>
                      <div class="dataTables_filter" id="DataTables_Table_1_filter">
                       
                            <form action="/admin/articles" method="get" >
                               <label>搜索: <input type="text" name="for" aria-controls="DataTables_Table_1">
                               <input type="submit"  value="提交" >
                            </label></div>
                         </form>
                         
    
                         
                      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                        <tr>
                            <td>ID</td>
                            <td>文章标题</td>
                            <td>创建时间</td>
                            <td>发布人</td>
                            <td>标签云</td>
                            <td>操作</td>
                        </tr>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        
                          @foreach($data as $k=>$v)
                        

                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->ctime}}</td>
                            <td>{{$v->username}}</td>
                            <td>
                               @if($v->ftype == 0)
                                <span>生活</span>
                                @elseif($v->ftype == 1)
                                <span>情感</span>
                                 @elseif($v->ftype == 2)
                                <span>军事</span>
                                 @else
                                <span>汽车</span>
                               @endif
                            </td>
                            <td>
                                <form action="/admin/articles/{{$v->id}}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="删除" class="btn btn-danger">
                                </form>

                               <!--  <a href="/" class="btn btn-warning">修改</a> -->
                                
                    <form action="/admin/articles/{{$v->id}}/edit" method="get"  style="display: inline;>
                        {{ csrf_field() }}
                       
                        
                        <input type="submit" class="btn btn-warning"  value="修改">
                     </form>
               
                                <a href="/admin/articles/{{$v->id}}" class="btn btn-info">查看文章内容</a>
                            </td>
                        </tr>
                          @endforeach
                         
                        </tbody>
                      </table>
                        <div class="page dataTables_paginate paging_full_numbers">
                            {!! $data->render() !!}
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- 内容结束-->
                   <div id="mydiv">
                <img src="/d/images/logo.png" alt="mws admin">
            </div>    
   @endsection   
           
  

@section('title')
    英雄联盟
@endsection   