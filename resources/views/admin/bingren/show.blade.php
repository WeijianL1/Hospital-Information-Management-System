<!-- 详情查看界面 -->
@extends('layouts.dropdown')
@section('content')
<head>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">病人基本信息
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="{{ url('admin/ruyuanjilu/'.$bingren->id) }}"><button class="btn btn-xs btn-info">查看入院记录</button></a>
				</div>
				<div class="panel-body">
						<div class="form-group">
							<label for="xingming ">住院号：</label>
							{{$bingren->id}}
							<br><br>
							<!-- 姓名 -->
							<label for="xingming ">姓名：</label>
							{{$bingren->xingming}}
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 生日 -->
							<label for="chushengriqi">出生日期：</label>{{$bingren->chushengriqi}}
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 年龄 -->
							<label for="nianling ">年龄：</label>
							{{$bingren->nianling}}
							<br><br>
							<!-- 性别 -->
							<label > 性别：</label>
							{{$bingren->xingbie}}
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 婚姻 -->
							<label for="hunyin">婚姻：</label>
							{{$bingren->hunyin}}
						<br><br>
						
							<!-- 籍贯 -->
							<label for="jiguan ">籍贯：</label>
							{{$bingren->jiguan}}
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 民族 -->
							<label for="minzu ">民族：</label>
							{{$bingren->minzu}}
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						<br><br>
							<!-- 职业 -->
							<label for="zhiye ">职业：</label>
							{{$bingren->zhiye}}
							<br><br>
							<!-- 单位 -->
							<label for="gongzuodw ">工作单位：</label>
							{{$bingren->gongzuodw}}
							<br><br>
							<!-- 住址 -->
							<label for="zhuzhi" style="">住址：</label>
							{{$bingren->zhuzhi}}
							<br><br>
							
								<!-- 入院日期 -->
								<label for="ruyuanriqi">入院日期：</label>
							    {{$bingren->ruyuanriqi}}
							    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<!-- 记录日期 -->
								<label  for="jiluriqi">记录日期：</label>
							    {{$bingren->jiluriqi}}
							<br><br>       
							<!-- 患者电话 -->
							<label for="huanzhedh ">患者电话：</label>
							{{$bingren->huanzhedh}}
							<br><br>
							<!-- 联系人电话 -->
							<label for="lianxirendh ">联系人电话：</label>
							{{$bingren->lianxirendh}}
						

						<br><br>
						<a href="{{ url('admin/bingren/'.$bingren->id.'/edit') }}"><button class="btn btn-md btn-info">编辑信息</button></a>
						<a href="{{ url('admin/ruyuanjilu/'.$bingren->id.'/edit') }}"><button class="btn btn-md btn-info">添加入院记录</button></a>
					<br><br>
					

				</div>
			</div>
			
		</div>
		
	</div>
	
</div>
</body>
@endsection