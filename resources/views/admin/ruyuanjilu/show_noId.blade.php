<!-- 此界面会引导用户添加入院记录 -->
@extends('layouts.dropdown')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">病人基本信息</div>
				<div class="panel-body">
					<div class="form-group">
						<h1>此病人没有入院记录，请添加</h1>

						<br>
						<a href="{{url('admin/ruyuanjilu/'.$bingren->id.'/edit')}}"><button class="btn btn-md btn-info">添加入院记录</button></a>
				</div>
			</div>
			
		</div>
		
	</div>
	
</div>
</div>


@endsection