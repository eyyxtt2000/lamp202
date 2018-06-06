<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Column;
use DB;

class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取搜索的关键字
        $ss = $request -> input('sousuo');
        // 获取数据,按paths排序,每页显示5条
        $data = DB::table('column') -> select('id','cname','pid','path','status','created_at','updated_at',DB::raw("concat(path,',',id) as paths")) -> where('cname','like','%'.$ss.'%') -> orderBy('paths','asc') -> paginate(5);
        foreach ($data as $key => $value) {
            // 统计字符串出现的次数
            $n = substr_count($value -> paths,',');
            // 拼接新的栏目名称
            $data[$key] -> cname = str_repeat('|----',$n).$value -> cname;
        }
        // 显示模板
        return view('/admin/column/index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取所属栏目数据,按paths排序
        $data = DB::table('column') -> select('id','cname','pid','path','status','created_at','updated_at',DB::raw("concat(path,',',id) as paths")) -> orderBy('paths','asc') -> get();

        foreach ($data as $key => $value) {

            // 统计字符串出现的次数
            $n = substr_count($value -> paths,',');
            // 拼接新的栏目名称
            $n = substr_count($value->paths,',');

            $data[$key] -> cname = str_repeat('|----',$n).$value -> cname;
        }
        // 显示添加模板
        return view('/admin/column/create',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 判断字段的合法性
        $this -> validate($request,[
                'cname' => 'required|unique:column',
            ],[
                'cname.required' => '栏目名称不能为空',
                'cname.unique' => '栏目名称重复',
            ]);
        // 获取父栏目ID,没有选择默认为0
        $pid = $request -> input('pid',0);
        if ($pid == 0) {
            // 顶级分类
            $path = 0;
        }else{
            // 子分类
            // 查找父类的ID
            $parent_data = Column::where('id',$pid) -> first();
            // 拼接子栏目的path
            $path = $parent_data['path'].','.$parent_data['id'];
        }
        // 添加到数据库
        $column = new Column;
        $column -> cname = $request -> input('cname');
        $column -> pid = $pid;
        $column -> path = $path;
        $res = $column -> save();
        if ($res) {
            return redirect('/admin/column')->with('success','添加成功');
        }else{
            return redirect('/admin/column/create')->with('error','添加失败');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取数据
        $data = Column::find($id);
        // 获取所属栏目数据,按paths排序
        $datas = DB::table('column') -> select('id','cname','pid','path','status','created_at','updated_at',DB::raw("concat(path,',',id) as paths")) -> orderBy('paths','asc') -> get();
        foreach ($datas as $key => $value) {
            // 统计字符串出现的次数
            $n = substr_count($value -> paths,',');
            // 拼接新的栏目名称
            $datas[$key] -> cname = str_repeat('|----',$n).$value -> cname;
        }
        // 显示需要修改的数据到模板
        return view('/admin/column/edit',['data' => $data,'datas' => $datas]);
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
        // 判断字段的合法性
        $this -> validate($request,[
                'cname' => 'required',
            ],[
                'cname.required' => '栏目名称不能为空',
            ]);
        // 查找PID等于该ID的子栏目
        $column = Column::where('pid',$id) -> first();
        if ($column) {
            return redirect('/admin/column') -> with('error','该分类下有子分类,不允许修改');
            exit;
        }
        // 获取父栏目ID,没有选择默认为0
        $pid = $request -> input('pid',0);
        if ($pid == 0) {
            // 顶级分类
            $path = 0;
        }else{
            // 子分类
            // 查找父类的ID
            $parent_data = Column::where('id',$pid) -> first();
            // 拼接子分类的path
            $path = $parent_data['path'].','.$parent_data['id'];
        }
        // 修改数据添加到数据库
        $column = Column::find($id);
        $column -> cname = $request -> input('cname');
        $column -> pid = $pid;
        $column -> path = $path;
        $res = $column -> save();

        if ($res) {
            return redirect('/admin/column')->with('success','修改成功');
        }else{
            return back() -> withInput('error','修改失败');
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
        // 检测当前分类下是否有子分类
        $column = Column::where('pid',$id) -> first();
        if ($column) {
            return redirect('/admin/column') -> with('error','该分类下有子分类,不允许删除');
            exit;
        }
        // 从数据库删除数据
        $res = Column::destroy($id);
        if ($res) {
            return redirect('/admin/column') -> with('success','删除成功');
        }else{
            return redirect('/admin/column') -> with('error','删除失败');
        }
    }
}
