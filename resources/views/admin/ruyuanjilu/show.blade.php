@extends('layouts.dropdown')
@section('content')
<head>
<script>


</script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">病人基本信息</div>
				<div class="panel-body">
						<div class="form-group">
							<label >住院号：</label>
							{{$ruyuanjilu->id}}
							<br><br>
							<!-- 姓名 -->
							<label >姓名：</label>
							{{$bingren->xingming}}
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label >年龄：</label>
							{{$bingren->nianling}}
							<br><br>
							<!-- 性别 -->
							<label > 性别：</label>
							{{$bingren->xingbie}}
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 婚姻 -->
							<label >婚姻：</label>
							{{$ruyuanjilu->hunyin}}
						<br><br>
						
							<!-- 籍贯 -->
							<label >主诉：</label>
							{{$ruyuanjilu->zhusu}}
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 民族 -->
							<label >持续时间：</label>
							{{floor($ruyuanjilu->chixushijian/12)}}年
							{{$ruyuanjilu->chixushijian%12}}月
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						<br><br>
							<!-- 职业 -->
							<label >既往史：</label>
							{{$ruyuanjilu->jiwangshi}}
							<br><br>
							<!-- 单位 -->
							<label >个人史：</label>
							{{$ruyuanjilu->gerenshi}}
							<br><br>
							<!-- 住址 -->
							<label>家族史：</label>
							{{$ruyuanjilu->jiazushi}}
							<br><br>
							
								<!-- 入院日期 -->
								<label >锁骨上淋巴结：</label>
							    {{$ruyuanjilu->suogushanglbj}}
							    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<!-- 记录日期 -->
								<label  >杵状指：</label>
							    {{$ruyuanjilu->chuzhuangzhi}}
							<br><br>       
							<!-- 患者电话 -->
							<label >下肢浮肿：</label>
							{{$ruyuanjilu->xiazhifuzhong}}
							<br><br>
							<!-- 联系人电话 -->
							<label >其他：</label>
							{{$ruyuanjilu->qita}}
						

						<br><br>
						<a href="{{ url('admin/ruyuanjilu/'.$ruyuanjilu->id.'/edit') }}"><button class="btn btn-md btn-info">编辑信息</button></a>
					<br><br>
					

				</div>
			</div>
			
		</div>
		
	</div>
	
</div>
</body>
@endsection