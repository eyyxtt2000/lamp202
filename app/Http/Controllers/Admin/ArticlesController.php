<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Models\Admin\Articles;
use App\Models\Admin\Articlesinfo;

//创建文章管理的控制器
class ArticlesController extends Controller
{
    //显示文章列表的方法
    public function index(Request $request)
    {

        $for=isset($_GET['for']) ? $_GET['for'] :'';
        $data=Articles::where('title','like','%'.$for.'%') -> paginate($request -> input('DataTables_Table_1_length',5));
        //加载列表页
        return view('admin.articles.index',['title'=>'文章列表','data'=>$data]);
    }

    //显示文章添加的方法
    public function create()
    {
        //加载模版
        return view('admin.articles.create',['title'=>'文章添加']);
    }

    //执行文章的添加方法
    public function store(Request $request)
    {
         DB::beginTransaction();//开启
        // 接受数据
        $articles=new Articles;
        $articles -> ftype = $request -> input('ftype');
        $articles -> title = $request -> input('title');
        $articles -> content = $request -> input('content');
        $articles -> author = session('adminUser')->username;
        $res = $articles -> save();
        if($res){
            DB::commit();
            return redirect('/admin/articles')->with('success','添加成功'); 
        }else{
           DB::rollBack();
           return back()->with('error','添加失败');
        }
    }

    //显示文章详情的方法
    public function show($id)
    {
        //获取文章内容
        $articles=Articles::find($id);

        // 模版
        return view('admin.Articles.show',['articles'=>$articles]);
    }

   //显示修改页面的方法
    public function edit($id)
    {
        $articles=Articles::find($id);
        return view('admin.articles.edit',['title'=>'文章修改','articles'=>$articles]);
    }

    //执行修改更新数据的方法 
    public function update(Request $request, $id)
    {

      DB::beginTransaction();//开启
        // 接数据
        $articles=Articles::find($id);
        $articles -> ftype = $request -> input('ftype');
        $articles -> title = $request -> input('title');
        $articles -> content = $request -> input('content');
        $res = $articles->save(); 
        if($res){
            DB::commit();
            return redirect('/admin/articles')->with('success','修改成功');
            
        }else{
           DB::rollBack();
           return back()->with('error','修改失败');
        }

    }

   //执行文章删除的方法
    public function destroy($id)
    {
        DB::beginTransaction();//开启
        $res = Articles::destroy($id);
        $data = Articles::find($id);
        if($res){
            DB::commit();//确认提交
            return redirect('/admin/articles')->with('success','删除成功');
        }else{
            DB::rollBack();//回滚
            return redirect('/admin/articles')->with('error','删除失败');
        }
    }
}
