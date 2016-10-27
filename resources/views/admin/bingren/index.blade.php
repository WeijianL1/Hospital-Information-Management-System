<!-- 病人管理界面 -->
@extends('layouts.dropdown')
@section('content')

<div class="container">  
    <div class="row">
        <div class="col-md-10   col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">病人信息 

                <a href="{{ url('admin/bingren/create') }}" class="btn btn-xs btn-primary" style="float:right;margin:auto">添加病人</a> 
                </div>

                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{url('admin/bingren')}}" method="GET" class="form-inline" role="search">
                    
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="搜索『住院号』或『姓名』" style="width:250px">
                        <span class="input-group-btn">
                            <button class="btn btn-default-sm" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    </form>
                    <table class="table table-hover">
                       <thead>
                          <tr>
                            <th>住院号</th>
                            <th>姓名</th>
                            <th>出生日期</th>
                            <th>年龄</th>
                            <th>性别</th>
                            <!-- <th>婚姻</th> -->
                            <th>籍贯</th>
                            <th>民族</th>
                            <!-- <th>工作单位</th>
                            <th>职业</th>
                            <th>住址</th> -->
                            <th>入院日期</th>
                            <th>记录日期</th>
                            <!-- <th>患者电话</th> -->
                            <!-- <th>联系人电话</th> -->
                            <th></th>
                            <th></th>
                           

                          </tr>
                       </thead>
                       <tbody>
                            @foreach($bingrens as $bingren)
                            <!-- 这里$bingrens这个数组是从BingrenController中index函数下『withBingrens』传进来的 -->
                          <tr>
                             <td>{{$bingren->id}}</td>
                             <td>{{$bingren->xingming}}</td>
                             <td>{{$bingren->chushengriqi}}</td>
                             <td>{{$bingren->nianling}}</td>
                             <td>{{$bingren->xingbie}}</td>
                            <!--  <td>{{$bingren->hunyin}}</td> -->
                             <td>{{$bingren->jiguan}}</td>
                             <td>{{$bingren->minzu}}</td>
                             <!-- <td>{{$bingren->gongzuodw}}</td>
                             <td>{{$bingren->zhiye}}</td>
                             <td>{{$bingren->zhuzhi}}</td> -->
                             <td>{{$bingren->ruyuanriqi}}</td>
                             <td>{{$bingren->jiluriqi}}</td>
                             <!-- <td>{{$bingren->huanzhedh}}</td> -->
                             <!-- <td>{{$bingren->lianxirendh}}</td> -->
                             <td><a href="{{ url('admin/bingren/'.$bingren->id.'') }}" class="btn btn-xs btn-success" style="float:right">详情</a></td>
                             <td></td>
                             <td><form action="{{ url('admin/bingren/'.$bingren->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-xs btn-danger">删除</button>
                            </form></td>
                            </tr>
                            @endforeach
                         
                       </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>  
@endsection