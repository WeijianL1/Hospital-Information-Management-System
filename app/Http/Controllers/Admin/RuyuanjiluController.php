<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ruyuanjilu;
use App\Bingren;

class RuyuanjiluController extends Controller
{
	public function index(){
   		return view('admin/ruyuanjilu/index')->withRuyuanjilus(Ruyuanjilu::all())->withBingrens(Bingren::all());
        // 这里即传递了Ruyuanjilu的数据，又传递了Bingren的数据，是为了在页面上显示病人姓名，而姓名都存在Bingren里边
	}

	public function create(){
		return view('admin/ruyuanjilu/create');
	}

	public function destroy($id){
		echo Ruyuanjilu::find($id)->delete();
		return redirect()->back()->withInput()->withErrors('删除成功！');
	}

    public function edit($id){
        if(!Ruyuanjilu::find($id)){ //如果入院记录里没有还没有id的记录，就新建一个；如果有，就编辑。
            //下一行中create_id是单独的一个视图文件，他的表头中包含了病人名字还有id
        return view('admin/ruyuanjilu/create_id')->withBingren(Bingren::find($id));
        #我在edit功能里创建了一个『依照id新建入院记录的view,所以可以实现点击『下一步』然后继续录入信息的功能
        }return view('admin/ruyuanjilu/edit')->withRuyuanjilu(Ruyuanjilu::find($id))->withBingren(Bingren::find($id));

    }
    public function update(Request $request,$id){
        $ruyuanjilu=Ruyuanjilu::find($id);
        $ruyuanjilu->id=$request->get('id');
        //如果用户选择了『其他』那么会抓取其他之后输入框中的内容，然后存入数据库；如果没选择其他，那么就只把选择的值存入数据库
        if ($request->get('zhusu')=="其他") {
            $ruyuanjilu->zhusu=$request->get('zhusu_qita');
        }
        else{$ruyuanjilu->zhusu=$request->get('zhusu');}

        $ruyuanjilu->chixushijian=$request->get('chixushijian');
        $arr=$_POST['jiwangshi'];//jiwangshi是多选内容，html传递的是一个数组，我把它存到$arr里
        $ruyuanjilu->jiwangshi=implode(',', $arr);//impoled函数会把数组元素之间加上自定义符号，然后生成一串完整字符串
        $ruyuanjilu->gerenshi=$request->get('gerenshi');
        $ruyuanjilu->xiyan_nian=$request->get('smoke-yrs');
        $ruyuanjilu->xiyan_zhi=$request->get('smoke-zhi');
        $ruyuanjilu->hunyin=$request->get('hunyinshi');
        $arr2=$_POST['jiazushi'];
        $ruyuanjilu->jiazushi=implode(',',$arr2);
        $ruyuanjilu->suogushanglbj=$request->get('suogushanglbj');
        $ruyuanjilu->chuzhuangzhi=$request->get('chuzhuangzhi');
        $ruyuanjilu->xiazhifuzhong=$request->get('xiazhifuzhong');
        $ruyuanjilu->qita=$request->get('qita');
        if ($ruyuanjilu->save()) {
            return redirect('admin/ruyuanjilu');
        }else{
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }
	public function store(Request $request){
		$ruyuanjilu =new Ruyuanjilu;
		$ruyuanjilu->id=$request->get('id');
        if ($request->get('zhusu')=="其他") {
            $ruyuanjilu->zhusu=$request->get('zhusu_qita');
        }
		else{$ruyuanjilu->zhusu=$request->get('zhusu');}
        $ruyuanjilu->chixushijian=$request->get('chixushijian');
        $arr=$_POST['jiwangshi'];
        $ruyuanjilu->jiwangshi=implode(',', $arr);
        $ruyuanjilu->gerenshi=$request->get('gerenshi');
        $ruyuanjilu->xiyan_nian=$request->get('smoke-yrs');
        $ruyuanjilu->xiyan_zhi=$request->get('smoke-zhi');
        $ruyuanjilu->hunyin=$request->get('hunyinshi');
        $arr2=$_POST['jiazushi'];
        $ruyuanjilu->jiazushi=implode(',',$arr2);
        $ruyuanjilu->suogushanglbj=$request->get('suogushanglbj');
        $ruyuanjilu->chuzhuangzhi=$request->get('chuzhuangzhi');
        $ruyuanjilu->xiazhifuzhong=$request->get('xiazhifuzhong');
        $ruyuanjilu->qita=$request->get('qita');
       

        if ($ruyuanjilu->save()) {
        	return redirect('admin/ruyuanjilu');
        }else{
        	return redirect()->back()->withInput()->withErrors('保存失败！');
        }
	}
    public function show($id){
        if(Ruyuanjilu::find($id)){//如果数据库中已经有此病人的入院记录了，那就转到show视图
            return view('admin/ruyuanjilu/show')->withRuyuanjilu(Ruyuanjilu::find($id))->withBingren(Bingren::find($id));
        }//如果数据库中还没有病人的入院记录，那就转到show_noId视图，引导用户添加记录
        return view("admin/ruyuanjilu/show_noId")->withBingren(Bingren::find($id));
    }
}