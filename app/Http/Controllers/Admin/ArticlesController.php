<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Models\Admin\Articles;
use App\Models\Admin\Articlesinfo;
use App\Models\Admin\Column;

//创建文章管理的控制器
class ArticlesController extends Controller
{
    //显示文章列表的方法
    public function index(Request $request)
    {

        //接收分页数据 默认为5
        $count=$request->input('count',5);

        //接收搜索数据 默认为空
        $for = $request -> input('for','');

        //以数组的形式接收分页和搜索数据，目的是返回给主页面
        $params=$request->all();
        // $for=isset($_GET['for']) ? $_GET['for'] :'';
        $data=Articles::where('title','like','%'.$for.'%') -> paginate($count);

        //加载列表页
        return view('admin.articles.index',['title'=>'文章列表','data'=>$data,'params'=>$params]);
    }

    //显示文章添加的方法
    public function create()
    {
        $data = DB::table('column') -> select('id','cname','pid','path','status','created_at','updated_at',DB::raw("concat(path,',',id) as paths")) -> orderBy('paths','asc') -> get();

            //dd($data);
        foreach ($data as $key => $value) {

            // 统计字符串出现的次数
            $n = substr_count($value->paths,',');

            $data[$key] -> cname = str_repeat('|----',$n).$value -> cname;
        }

        //加载模版
        return view('admin.articles.create',['title'=>'文章添加','data'=>$data]);
    }

    //执行文章的添加方法
    public function store(Request $request)
    {
         DB::beginTransaction();//开启


        // 接受数据
        //实例化文章
        $articles=new Articles;
        //接收所属栏目
        $articles -> lanmu = $request -> input('lanmu');
        //接收文章标题
        $articles -> title = $request -> input('title');
        //接收文章内容
        $articles -> content = $request -> input('content');
        //处理上传的图片
        if($request -> hasFile('image')){
            //获取上传的图片
            $image = $request -> file('image');
            //获取后缀
            $ext = $image -> getClientOriginalExtension();
            //为图片起新的名字
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //设置路径名称
            $dir_name = '/articles_images/'.date('Ymd',time());
            //路径的拼接
            $image_dir = $dir_name.'/'.$temp_name;
            //图片上传
            $image -> move('.'.$dir_name,$temp_name);
            //把图片的路径存到数据中
            $articles -> articles_image_path = $image_dir;

        }
        //获取文章的作者
        $articles -> author = session('adminUser')->username;
        //把数据保存到数据库
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
        $data = DB::table('column') -> select('id','cname','pid','path','status','created_at','updated_at',DB::raw("concat(path,',',id) as paths")) -> orderBy('paths','asc') -> get();

        foreach ($data as $key => $value) {

            // 统计字符串出现的次数
            $n = substr_count($value->paths,',');

            $data[$key] -> cname = str_repeat('|----',$n).$value -> cname;
        }
        $articles=Articles::find($id);
        // dd($articles);
        return view('admin.articles.edit',['title'=>'文章修改','data'=>$data,'articles'=>$articles]);
    }


    //执行修改更新数据的方法

    public function update(Request $request, $id)
    {



      DB::beginTransaction();//开启
        // 通过id查询数据
        $articles=Articles::find($id);
        $articles -> lanmu = $request -> input('lanmu');
        $articles -> title = $request -> input('title');
         //处理图片路径
       if($request -> hasFile('image')){
            //获取上传的图片
            $image = $request -> file('image');
            //获取后缀
            $ext = $image -> getClientOriginalExtension();
            //为图片起新的名字
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //设置路径名称
            $dir_name = '/articles_images/'.date('Ymd',time());
            //路径的拼接
            $image_dir = $dir_name.'/'.$temp_name;
            //图片上传
            $image -> move('.'.$dir_name,$temp_name);
            //把图片的路径存到数据中
            $articles -> articles_image_path = $image_dir;

        }
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
