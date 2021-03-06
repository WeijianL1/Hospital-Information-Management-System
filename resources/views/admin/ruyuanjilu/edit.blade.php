@extends('layouts.dropdown')
@section('content')
<head>
<script>
function judge(checkboxId,inputId){
			//alert(document.getElementById(checkboxId).checked);
			if(document.getElementById(checkboxId).checked==false){
				document.getElementById(inputId).style.display="none";
			}else{document.getElementById(inputId).style.display="";}
		}
function month(){
			var yrs=document.getElementById("nian").value;
			var mon=document.getElementById("yue").value;
			var months=12*parseInt(yrs)+parseInt(mon);

			document.getElementById("months").value=months;
		}
function checkedOrNot(checkboxName){
//未完成：读取数据库已经check的项目，然后反映在编辑页面上
}
</script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
				编辑入院记录
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				姓名：{{$bingren->xingming}}
				</div>
				<div class="panel-body">
					@if(count($errors)>0)
						<div class="alert alert-danger">
							<strong>编辑</strong>输入不符合要求<br><br>
							{!! implode('<br>', $errors->all()) !!}
							<!-- 一直不懂这行什么意思 -->
						</div>
					@endif

					<form action="{{url('admin/ruyuanjilu/'.$ruyuanjilu->id)}}" method="POST" class="form-inline" role="form">
						{{method_field('PATCH')}}
						{!! csrf_field()!!}
						<div class="form-group">
							<label >住院号：</label>
							<input type="text" name="id" id="id" class="form-control" required="required"  style="width:100px" value="{{$ruyuanjilu->id}}">
							<br><br>
						<div>
							<label>主诉：</label>
								<input type="radio" name="zhusu" id="chatifaxian" value="查体发现"  onclick="document.getElementById('otherinput1').style.display='none'"> 查体发现
							&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="zhusu" id="kexue" value="咳血" onclick="document.getElementById('otherinput1').style.display='none'"> 咳血
							&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="zhusu" id="kesou" value="咳嗽，无血" onclick="document.getElementById('otherinput1').style.display='none'"> 咳嗽，无血
							&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="zhusu" id="xiongtong" value="胸痛" onclick="document.getElementById('otherinput1').style.display='none'"> 胸痛
							&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="zhusu" id="chuanbie" value="喘憋" onclick="document.getElementById('otherinput1').style.display='none'"> 喘憋
							&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="zhusu" id="qita1" value="其他" onclick="document.getElementById('otherinput1').style.display=''"> 其他
							<input type="text" name="zhusu_qita" id="otherinput1" style="display:none" class="form-control">
							</div>
							<br>

							<div>
								<label>症状持续时间：</label>
								<input type="int" id="nian"  class="form-control" style="width:50px" value="{{floor($ruyuanjilu->chixushijian/12)}}"> 年
								<input type="int" id="yue" class="form-control" style="width:50px" value="{{$ruyuanjilu->chixushijian%12}}"> 月
								<input type="int" name="chixushijian" id="months" style="display:none" value="{{$ruyuanjilu->chixushijian}}">
							</div>
							<br>

							<div>
								<label>既往史：</label>
								<input type="checkbox" name="jiwangshi[]" id="zhongliu" value="肿瘤" onclick="document.getElementById('otherinput2').style.display='none'"> 肿瘤
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="checkbox" name="jiwangshi[]" id="jiehe" value="结核" onclick="document.getElementById('otherinput2').style.display='none'"> 结核
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="checkbox" name="jiwangshi[]" id="manxingbing" value="慢性病" onclick="document.getElementById('otherinput2').style.display='none'"> 慢性病
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="checkbox" name="jiwangshi[]" id="qita2" value="" onclick="judge('qita2','otherinput2')" > 其他
								<input type="text" name="jiwangshi[]" id="otherinput2" style="display:none" class="form-control"> 
							</div>
							<br>
							<div>
								<label>个人史：</label>
								<input type="radio" name="gerenshi" id="buxiyan" value="不吸烟"
								onclick="document.getElementById('smoke-yrs').style.display='none';document.getElementById('smoke-zhi').style.display='none';document.getElementById('yrs').style.display='none';document.getElementById('zhi').style.display='none'"
								> 不吸烟
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="gerenshi" id="xiyan" value="吸烟" 
								onclick="document.getElementById('smoke-yrs').style.display='';document.getElementById('smoke-zhi').style.display='';document.getElementById('yrs').style.display='';document.getElementById('zhi').style.display=''"
								> 吸烟
								&nbsp;
								<input type="int" name="smoke-yrs" id="smoke-yrs" style="display:none;width:50px" class="form-control"> <label id="yrs" style="display:none"> 年</label>
								<input type="int" name="smoke-zhi" id="smoke-zhi" style="display:none;width:50px" class="form-control"><label id="zhi" style="display:none"> 支/天</label> 
							</div>
							<br>
							<!-- 婚姻 -->
							<label for="hunyin">婚姻：</label>
						      <select class="form-control" name="hunyin" value="{{$ruyuanjilu->hunyin}}">
						         <option value="已婚" 
						         <?php if ($ruyuanjilu->hunyin=="已婚"){echo "selected='selected'";}?>>已婚</option>
						         <option value="未婚"
						         <?php if ($ruyuanjilu->hunyin=="未婚"){echo "selected='selected'";}?>>未婚</option>
						         <option value="丧偶"
						         <?php if ($ruyuanjilu->hunyin=="丧偶"){echo "selected='selected'";}?>>丧偶</option>
						         <option value="离异"
						         <?php if ($ruyuanjilu->hunyin=="离异"){echo "selected='selected'";}?>>离异</option>
						      </select>
						</div>
						 <br>
							<br>
							<div>
								<label>家族史：</label>
								<input type="radio" name="jiazushi[]" id="feiaishi" value="肺癌史" onclick="document.getElementById('otherinput3').style.display='none'"> 肺癌史
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="jiazushi[]" id="wufeiaishi" value="无肺癌史" onclick="document.getElementById('otherinput3').style.display='none'"> 无肺癌史
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="checkbox" name="jiazushi[]" id="qita3" value="" onclick="judge('qita3','otherinput3')"> 其他肿瘤
								<input type="text" name="jiazushi[]" id="otherinput3" style="display:none" class="form-control">
							</div>
							<hr>
							<h4>体格检查：</h4>
							<br>
							<div>
								<label>锁骨上淋巴结：</label>
								<input type="radio" name="suogushanglbj" id="suogushanglbj-yes" value="有"> 有
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="suogushanglbj" id="suogushanglbj-no" value="无"> 无
 							</div>
 							<br>
 							<div>
								<label>杵状指：</label>
								<input type="radio" name="chuzhuangzhi" id="chuzhuangzhi-yes" value="有"> 有
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="chuzhuangzhi" id="chuzhuangzhi-no" value="无"> 无
 							</div>
 							<br>
 							<div>
								<label>下肢浮肿：</label>
								<input type="radio" name="xiazhifuzhong" id="xiazhifuzhong-yes" value="有"> 有
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="xiazhifuzhong" id="xiazhifuzhong-no" value="无"> 无
 							</div>
 							<br>
 							<div>
 								<label>其他：</label>
 								<textarea name="qita" id="qita" placeholder="其他补充信息" class="form-control"  >{{$ruyuanjilu->qita}}</textarea>
 							</div>
							

  
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