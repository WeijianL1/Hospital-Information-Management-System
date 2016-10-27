<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bingren;

class BingrenController extends Controller
{
     

	public function index(){//管理页面
            $search = \Request::get('search');
        if(!is_null($search)){
        $rs = Bingren::where('xingming','like','%'.$search.'%')
            ->orWhere('id','=',$search)
            ->orderBy('id')
            ->paginate(20);//每页只显示20个结果
            return view('admin/bingren/index')->with('bingrens',$rs);}
            // 以上代码是用于搜索功能的
        return view('admin/bingren/index')->withBingrens(Bingren::all());
    }
    
	

	public function create(){//新建记录
		return view('admin/bingren/create');
	}

	public function destroy($id){//负责删除记录。如果在url里边传递了id值，函数就可以收到，然后作为参数使用。比如url是admin/bingren/destroy/10，那这个函数就会把10作为参数操作，以下的函数同理
		echo Bingren::find($id)->delete();
		return redirect()->back()->withInput()->withErrors('删除成功！');
	}

    public function edit($id){//负责编辑记录
        return view('admin/bingren/edit')->withBingren(Bingren::find($id));//注意这里的是withBingren而不是withBingrens
    }
    public function update(Request $request,$id){//负责编辑后更新记录
        //request 里包含的是html表单发来的数据
        $bingren=Bingren::find($id);
        $bingren->id=$request->get('id');
        $bingren->xingming=$request->get('xingming');
        $bingren->chushengriqi=$request->get('chushengriqi');
        $bingren->nianling=$request->get('nianling');
        $bingren->xingbie=$request->get('xingbie');
        $bingren->hunyin=$request->get('hunyin');
        $bingren->jiguan=$request->get('jiguan');
        $bingren->minzu=$request->get('minzu');
        $bingren->gongzuodw=$request->get('gongzuodw');
        $bingren->zhiye=$request->get('zhiye');
        $bingren->zhuzhi=$request->get('zhuzhi');
        $bingren->ruyuanriqi=$request->get('ruyuanriqi');
        $bingren->jiluriqi =$request->get('jiluriqi');
        $bingren->huanzhedh =$request->get('huanzhedh');
        $bingren->lianxirendh =$request->get('lianxirendh');

        if ($bingren->save()) {
            return redirect('admin/bingren');
        }else{
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }
	public function store(Request $request){
        // 负责新建后储存记录
		$bingren =new Bingren;
		$bingren->id=$request->get('id');
		$bingren->xingming=$request->get('xingming');
        $bingren->chushengriqi=$request->get('chushengriqi');
        $bingren->nianling=$request->get('nianling');
        $bingren->xingbie=$request->get('xingbie');
        $bingren->hunyin=$request->get('hunyin');
        $bingren->jiguan=$request->get('jiguan');
        $bingren->minzu=$request->get('minzu');
        $bingren->gongzuodw=$request->get('gongzuodw');
        $bingren->zhiye=$request->get('zhiye');
        $bingren->zhuzhi=$request->get('zhuzhi');
        $bingren->ruyuanriqi=$request->get('ruyuanriqi');
        $bingren->jiluriqi =$request->get('jiluriqi');
        $bingren->huanzhedh =$request->get('huanzhedh');
        $bingren->lianxirendh =$request->get('lianxirendh');

        if ($bingren->save()) {
        	return redirect('admin/ruyuanjilu/'.$request->get('id').'/edit');//这行代码决定了执行储存之后，跳转到哪个页面，可以改成自己想要的url
        }else{
        	return redirect()->back()->withInput()->withErrors('保存失败！');
        }
	}
    public function show($id){
        // 负责显示记录详情
        return view('admin/bingren/show')->withBingren(Bingren::find($id));
    }
}