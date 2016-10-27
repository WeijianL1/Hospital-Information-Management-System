<!-- 此为病人信息编辑界面 -->
@extends('layouts.dropdown')
@section('content')
<head>
<script>
	function getAge(){//用于计算病人年龄
		var   today= new Date();   
		var birth=document.getElementById("chushengriqi").value;
		var birthYr=birth.substr(0,4);
		var birthMon=birth.substr(5,7);
		var birthDate=birth.substr(8);
		var age=(today.getFullYear()-birthYr);

		if(birthMon>today.getMonth()){age= age-1;}
		else if(today.getDate()<birthDate){
			age=age-1;
		}
		document.getElementById("nianling").value=age;
	}

</script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">编辑病人基本信息</div>
				<div class="panel-body">
					@if(count($errors)>0)
						<div class="alert alert-danger">
							<strong>编辑</strong>输入不符合要求<br><br>
							{!! implode('<br>', $errors->all()) !!}
						</div>
					@endif

					<form action="{{url('admin/bingren/'.$bingren->id)}}" method="POST" class="form-inline" role="form">
						{{method_field('PATCH')}}
						{!! csrf_field()!!}
						
						<div class="form-group">
							<label for="xingming ">住院号：</label>
							<input type="text" name="id" id="id" class="form-control" required="required"  style="width:100px" value="{{$bingren->id}}">
							<!-- 编辑的时候需要获取病人的各字段值，然后直接填入输入框，两个大括号{{}}的意思是在其中间的东西要被视为变量，而不是字符串 -->
							<br><br>
							<!-- 姓名 -->
							<label for="xingming ">姓名：</label>
							<input type="text" name="xingming" id="xingming" class="form-control" required="required"  style="width:100px" value="{{$bingren->xingming}}">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 生日 -->
							<label for="chushengriqi">出生日期：</label>
							    <input name="chushengriqi" size="16" id="chushengriqi" type="text"  readonly class="form_datetime3 form-control" value="{{$bingren->chushengriqi}}">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 年龄 -->
							<label for="nianling ">年龄：</label>
							<input type="int" name="nianling" id="nianling" class="form-control" required="required" style="width:100px" onfocus="getAge()" onclick="getAge()" value="{{$bingren->nianling}}">
							<br><br>
							<!-- 性别，这一项因为是单选，需要先判断哪个已经被选上了 -->
							<label > 性别：</label>
							<div class="radio">
							      <input type="radio" name="xingbie" id="xingbie1" value="女" 
							      <?php if ($bingren->xingbie=="女"){echo "checked";} 
							      ?>> 女
							</div>
							&nbsp;&nbsp;
							<div class="radio">
							      <input type="radio" name="xingbie" id="xingbie2" value="男"
							      <?php if ($bingren->xingbie=="男"){echo "checked";} 
							      ?>>
							         男
							</div>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 婚姻,同理需要判断哪个是被选上的 -->
							<label for="hunyin">婚姻：</label>
						      <select class="form-control" name="hunyin" value="{{$bingren->hunyin}}">
						         <option value="已婚" 
						         <?php if ($bingren->hunyin=="已婚"){echo "selected='selected'";}?>>已婚</option>
						         <option value="未婚"
						         <?php if ($bingren->hunyin=="未婚"){echo "selected='selected'";}?>>未婚</option>
						         <option value="丧偶"
						         <?php if ($bingren->hunyin=="丧偶"){echo "selected='selected'";}?>>丧偶</option>
						         <option value="离异"
						         <?php if ($bingren->hunyin=="离异"){echo "selected='selected'";}?>>离异</option>
						      </select>
						     
						</div>
						<br><br>
						<div class="form-group">
							<!-- 籍贯 -->
							<label for="jiguan ">籍贯：</label>
							<input type="text" name="jiguan" id="jiguan" class="form-control" required="required"  style="" value="{{$bingren->jiguan}}">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 民族 -->
							<label for="minzu ">民族：</label>
							<input type="text" name="minzu" id="minzu" class="form-control" required="required"  style="" value="{{$bingren->minzu}}">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</div>
						<br><br>
						<div class="form-group">
							<!-- 职业 -->
							<label for="zhiye ">职业：</label>
							<input type="text" name="zhiye" id="zhiye" class="form-control" required="required"  style="width:300px" value="{{$bingren->zhiye}}">
							<br><br>
							<!-- 单位 -->
							<label for="gongzuodw ">工作单位：</label>
							<input type="text" name="gongzuodw" id="gongzuodw" class="form-control" required="required"  style="width:273px" value="{{$bingren->gongzuodw}}">
							<br><br>
							<!-- 住址 -->
							<label for="zhuzhi" style="">住址：</label>
							<textarea name="zhuzhi" id="zhuzhi" class="form-control" required="required" style="width:300px;height:100px">{{$bingren->zhuzhi}}</textarea>
							<!-- textarea不用设置value项，直接把内容填到中间就好了 -->
							<br><br>
							<div class="form-group">
								<!-- 入院日期 -->
								<label for="ruyuanriqi">入院日期：</label>
							    <input name="ruyuanriqi" size="16" type="text"  readonly class="form_datetime form-control" value="{{$bingren->ruyuanriqi}}">
							    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<!-- 记录日期 -->
								<label  for="jiluriqi">记录日期：</label>
							    <input name="jiluriqi" size="16" type="text"  readonly class="form_datetime2 form-control" value="{{$bingren->jiluriqi}}">
							</div>
							<br><br>       
							<!-- 患者电话 -->
							<label for="huanzhedh ">患者电话：</label>
							<input type="int" name="huanzhedh" id="huanzhedh" class="form-control" required="required"  style="width:273px" value="{{$bingren->huanzhedh}}">
							<br><br>
							<!-- 联系人电话 -->
							<label for="lianxirendh ">联系人电话：</label>
							<input type="int" name="lianxirendh" id="lianxirendh" class="form-control" required="required"  style="width:260px" value="{{$bingren->lianxirendh}}">
    
							<script type="text/javascript">
							
							    $(".form_datetime").datetimepicker({
							        format: "yyyy-mm-dd ",
							        autoclose: true,
							        todayBtn: true,
							        pickerPosition: "bottom",
							        todayBtn:"linked",
							        minView:2,
							        language:"zh-CN",

							    });
							    $(".form_datetime2").datetimepicker({
							        format: "yyyy-mm-dd ",
							        autoclose: true,
							        todayBtn: true,
							        pickerPosition: "bottom",
							        todayBtn:"linked",
							        minView:2,
							        language:"zh-CN",
							    });
							
							
							    $(".form_datetime3").datetimepicker({
							        format: "yyyy-mm-dd ",
							        autoclose: true,
							        todayBtn: true,
							        pickerPosition: "bottom",
							        todayBtn:"linked",
							        minView:2,
							        language:"zh-CN",

							    });
							</script> 
  
						</div>

						<br><br>
						<button class="btn btn-md btn-info">保存修改</button>
					</form>
					<br><br>
					

				</div>
			</div>
			
		</div>
		
	</div>
	
</div>
</body>
@endsection