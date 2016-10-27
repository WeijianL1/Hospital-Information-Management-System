@extends('layouts.dropdown')
@section('content')

<div class="container">  
    <div class="row">
        <div class="col-md-10   col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">入院记录
                <a href="{{ url('admin/ruyuanjilu/create') }}" class="btn btn-xs btn-primary" style="float:right;margin:auto">添加入院记录</a> 
                </div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif


                    <table class="table table-hover">
                       <thead>
                          <tr>
                            <th>住院号</th>
                            <th>主诉</th>
                            <th>持续时间</th>
                            <th>既往史</th>
                            <th>个人史</th>
                            <th>家族史</th>
                            <th></th>
                            <th></th>
                           

                          </tr>
                       </thead>
                       <tbody>
                            @foreach($ruyuanjilus as $ruyuanjilu)
                          <tr>
                             <td>{{$ruyuanjilu->id}}</td>
                             
                             <td>{{$ruyuanjilu->zhusu}}</td>
                            <?php 
                            $mons=$ruyuanjilu->chixushijian;
                            $yrs=floor($mons/12);
                            $mon=$mons%12;
                             ?>


                             <td>{{$yrs}}年{{$mon}}月</td>
                             <td>{{$ruyuanjilu->jiwangshi}}</td>
                             <td>{{$ruyuanjilu->gerenshi}}</td>
                             <td>{{$ruyuanjilu->jiazushi}}</td>

                         
                             <td><a href="{{ url('admin/ruyuanjilu/'.$ruyuanjilu->id.'') }}" class="btn btn-xs btn-success" style="float:right">详情</a></td>
                             <td></td>
                             <td><form action="{{ url('admin/ruyuanjilu/'.$ruyuanjilu->id) }}" method="POST" style="display: inline;">
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