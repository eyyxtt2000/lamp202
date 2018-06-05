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
                      <i class="icon-table"></i>{{ $title }}</span>
                  </div>
                  <div class="mws-panel-body no-padding">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                      <form action="/admin/articles" method="get" >
                        <div id="DataTables_Table_1_length" class="dataTables_length">
                            <label>显示
                                <select name="count" size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1">
                                    <option value="5" @if( isset($params) && !empty($params['count']) &&$params['count']==5) selected @endif>5</option>
                                    <option value="10" @if( isset($params) && !empty($params['count']) &&$params['count']==10) selected @endif>10</option>
                                    <option value="15" @if( isset($params) && !empty($params['count']) &&$params['count']==15) selected @endif>15</option>
                                    <option value="20" @if( isset($params) && !empty($params['count']) &&$params['count']==20) selected @endif>20</option>
                                </select>条</label>
                        </div>
                        <div class="dataTables_filter" id="DataTables_Table_1_filter">

                            <label>搜索: <input type="text" name="for" value="{{$params['for'] or ''}}">
                                <input type="submit" class="btn btn-info" value="搜索" >
                            </label>
                        </div>
                    </form>



                      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                        <tr>
                            <td>ID</td>
                            <td>所属栏目</td>
                            <td>文章标题</td>
                            <td>文章作者</td>
                            <td>文章图片</td>
                            <td>发表时间</td>
                            <td>更新时间</td>
                            <td>操作</td>
                        </tr>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                          @foreach($data as $k=>$v)

                        <tr>
                            <td>{{$v->id}}</td> 
                            <td>{{$v->lanmu}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->author}}</td>
                            <td>
                                <img class="img-circle img-thumbnail img-responsive" style="width:50px; height:60px" src="{{url('/').$v->articles_image_path}}" alt="">
                            </td>
                            <td>{{$v->created_at}}</td>
                            <td>{{$v->updated_at}}</td>
                            <td>
                          <form action="/admin/articles/{{$v->id}}" method="post" style="display: inline;">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <input type="submit" value="删除" class="btn btn-danger">
                          </form>

                          <form action="/admin/articles/{{$v->id}}/edit" method="get"  style="display: inline;">
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
   @endsection



@section('title')
    英雄联盟
@endsection