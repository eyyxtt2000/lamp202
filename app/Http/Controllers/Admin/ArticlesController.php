<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Models\Admin\Articles;
use App\Models\Admin\Articlesinfo;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $for = $request -> input('for');
       //dump($for);
        //加载列表页
      /*  $data=Articles::all();
        $data->articlesinfo->content;*/
       $data = DB::table('articles as a')
        ->join('users as u','a.uid','=','u.id')
        ->join('articles_info as af','a.id','=','af.tid')
        ->select('a.title','a.ctime','a.id','a.ftype','u.username','af.content')
        ->where('a.title','like','%'.$for.'%')
        ->paginate(4);
        /*$data=User::paginate(2);
        
       dd($data->uarticles->title);*/
    //var_dump($data);
        // dump(session('success'));
        return view('admin.articles.index',['title'=>'文章列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模版
        return view('admin.articles.create',['title'=>'文章添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();//开启
        // 接受数据
        $data = $request -> except('_token','content');
        // 发表时间
        $data['ctime'] = date('Y-m-d H:i:s',time());
        // 发表人
        $data['uid'] = session('uid',28);
        
        // 插入数据库
        $tid = DB::table('articles')->insertGetId($data);
        
        $data2['tid'] = $tid;
        $data2['content'] = $request -> input('content');
        $res = DB::table('articles_info')->insert($data2);
        if($tid && $res){
            DB::commit();
            return redirect('/admin/articles')->with('success','添加成功');
            
        }else{
           DB::rollBack();
           return back()->with('error','添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //获取文章内容
        $data = DB::table('articles_info')->where('tid','=',$id)->select('content')->first();

        // 模版
        return view('admin.Articles.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        //
        $title='修改页面';
         $data = DB::table('articles as a')
        ->join('articles_info as in','a.id','=','in.tid')

        
        ->select('a.title','a.ctime','a.id','a.ftype','in.content')
        ->where('a.id','=',$id)
        ->first();
       //dd($data);
        echo '您当前修改的是第'.$id.'条数据信息';
         //dd($id);
         
        return view('admin.articles.edit',['id'=>$id,'title'=>$title,'data'=>$data]);
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::beginTransaction();//开启
        // 接数据
        $data = $request -> except('_token','content','_method');
        
        // 修改插入数据库
        $tid = DB::table('articles')->where('id','=',$id)->update($data);

        $data2['content'] = $request -> input('content');
        $res = DB::table('articles_info')->where('tid','=',$id)->update($data2);
        if($tid || $res){
            DB::commit();
            return redirect('/admin/articles')->with('success','修改成功');
            
        }else{
           DB::rollBack();
           return back()->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res1 = DB::table('articles')->where('id','=',$id)->delete();
        $res2 = DB::table('articles_info')->where('tid','=',$id)->delete();
        if($res1 && $res2){
            return redirect('/admin/articles')->with('success','删除成功');
        }else{
            return redirect('/admin/articles')->with('error','删除失败');
        }
    }
}
