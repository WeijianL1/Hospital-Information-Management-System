<!-- 这张视图对应「新建病人信息」页面 -->
@extends('layouts.dropdown')
@section('content')
<head>
<script>
	function getAge(){//函数用于在用户选择出生日期后计算年龄
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
				<div class="panel-heading">Basic Info </div>
				<div class="panel-body">
					@if(count($errors)>0)
						<div class="alert alert-danger">
							<strong>Add failed</strong>Illigal Input<br><br>
							{!! implode('<br>', $errors->all()) !!}
						</div>
					@endif

					<form action="{{url('admin/bingren')}}" method="POST" class="form-inline" role="form">
						{!! csrf_field()!!}
						<!-- 这是csrf验证，防止出错，具体原理在laravel文档上 -->
						<div class="form-group">
							<label for="xingming ">Patient Nubmer</label>
							<input type="text" name="id" id="id" class="form-control" required="required
							"  style="width:100px">
							<!-- required元素可以指定哪个输入框必填，此页面中我设定所有输入框都是必填，在其他视图中，我没有做设定，可以根据需要设置；name和id都是用于指定页面中的某个元素，但是name名称可以重复，id不可重复。js中可以用ducument.getElementById("id名称")来获取某个元素的值。如果你查看BingrenController中的store或update函数，会发现他们是通过name来获取值的。 -->
							<br><br>
							<!-- 姓名 -->
							<label for="xingming ">Full Name</label>
							<input type="text" name="xingming" id="xingming" class="form-control" required="required"  style="width:100px">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 生日 -->
							<label for="ruyuanriqi">Date of Birth</label>
							    <input name="chushengriqi" size="16" id="chushengriqi" type="text" value="" readonly class="form_datetime3 form-control" >

							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 年龄 -->
							<label for="nianling ">Age: </label>
							<input type="int" name="nianling" id="nianling" class="form-control" required="required" style="width:100px" onfocus="getAge()" onclick="getAge()">
							<br><br>
							<!-- 性别 -->
							<label > Gender: </label>
							<div class="radio">
							      <input type="radio" name="xingbie" id="xingbie1" 
							         value="女" checked> Female
							</div>
							&nbsp;&nbsp;
							<div class="radio">
							      <input type="radio" name="xingbie" id="xingbie2" 
							         value="男">
							         Male
							</div>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 婚姻 -->
							<label for="hunyin">Marrigae</label>
						      <select class="form-control" name="hunyin">
						         <option value="已婚">Married</option>
						         <option value="未婚">Single</option>
						         <option value="丧偶">Widowed</option>
						         <option value="离异">Divorced</option>
						      </select>
						     
						</div>
						<br><br>
						<div class="form-group">
							<!-- 籍贯 -->
							<label for="jiguan ">Citizensihp: </label>
							<input type="text" name="jiguan" id="jiguan" class="form-control" required="required"  style="">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 这里删掉了民族 -->
						</div>
						<br><br>
						<div class="form-group">
							<!-- 职业 -->
							<label for="zhiye ">Occupation </label>
							<input type="text" name="zhiye" id="zhiye" class="form-control" required="required"  style="width:300px">
							<br><br>
							<!-- 删去了单位 -->
							<br><br>
							<!-- 住址 -->
							<label for="zhuzhi" style="">Home Address</label>
							<textarea name="zhuzhi" id="zhuzhi" class="form-control" required="required" style="width:300px;height:100px"></textarea>
							<br><br>
							<div class="form-group">
								<!-- 入院日期 -->
								<label for="ruyuanriqi">入院日期：</label>
							    <input name="ruyuanriqi" size="16" type="text" value="" readonly class="form_datetime form-control">
							    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<!-- 记录日期 -->
								<label  for="jiluriqi">记录日期：</label>
							    <input name="jiluriqi" size="16" type="text" value="" readonly class="form_datetime2 form-control">
							</div>
							<br><br>       
							<!-- 患者电话 -->
							<label for="huanzhedh ">患者电话：</label>
							<input type="int" name="huanzhedh" id="huanzhedh" class="form-control" required="required"  style="width:273px">
							<br><br>
							<!-- 联系人电话 -->
							<label for="lianxirendh ">联系人电话：</label>
							<input type="int" name="lianxirendh" id="lianxirendh" class="form-control" required="required"  style="width:260px">
    						<!-- 以下代码是用于日期选择器的，此页面一共有3个日期选择器 -->
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
						<button class="btn btn-md btn-info">保存，并添加入院记录</button>
					</form>
					<br><br>
					

				</div>
			</div>
			
		</div>
		
	</div>
	
</div>
</body>
@endsection