@extends('layouts.app')
@section('dropdown')

<div class="container-fluid" >
        <div class="row">
            <div class="col-md-2" >
                <ul id="main-nav" class="nav nav-tabs nav-stacked" style="margin-left:5px;display:">
                    <li class="active">
                        <a href="/home">
                            <i class="fa fa-btn fa-home"></i>
                            Home      
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}">
                           <i class="fa fa-btn fa-user"></i>
                            My Account        
                        </a>
                    </li>
                     <li>
                        <a href="#info" class="nav-header collapsed" data-toggle="collapse">
                            <i class="fa fa-btn fa-info"></i>
                            Info
                            
                            <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="info" class="nav nav-list secondmenu collapse" style="height: 0px;">
                            <li><a href="{{url('admin/bingren/create')}}"><i class="fa fa-btn fa-heartbeat"></i>&nbsp;Add Patients</a></li>
                            <li><a href="{{url('admin/ruyuanjilu/create')}}"><i class="fa fa-btn fa-stethoscope"></i>&nbsp;Add Hospital Record</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('admin/bingren') }}">
                            <i class="fa fa-btn fa-wheelchair"></i>
                            Manage Patients
                        </a>
                    </li>
                    <!-- <li>
                        <a href="{{ url('admin/bingren') }}">
                            <i class="fa fa-btn fa-search"></i>
                            Search
                        </a>
                    </li> -->
                </ul>
            </div>
@endsection