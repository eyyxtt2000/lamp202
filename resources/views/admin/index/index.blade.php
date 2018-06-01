@extends('admin.layout.index')
@section('content')

       <style type="text/css">
            .result-wrap {
            padding: 10px 20px;
            border-bottom: 1px solid #e5e5e5;

        }

        li {
            list-style: none;

        }

       </style>
<div class="result-wrap">
            <div class="result-title">
                <h1>欢迎管理员 {{ $user = session('adminUser')->username }} 登录操作系统</h1>
                <h3>您当前操作系统基本信息如下</h3>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info">WINNT</span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info">Apache/2.2.21 (Win64) PHP/5.3.10</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info">apache2handler</span>
                    </li>
                    <li>
                        <label class="res-lab">静静设计-版本</label><span class="res-info">v-0.1</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info">2014年3月18日 21:08:24</span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info">localhost [ 127.0.0.1 ]</span>
                    </li>
                    <li>
                        <label class="res-lab">Host</label><span class="res-info">127.0.0.1</span>
                    </li>
                </ul>
            </div>
        </div>




@endsection



@section('title')
    英雄联盟
@endsection