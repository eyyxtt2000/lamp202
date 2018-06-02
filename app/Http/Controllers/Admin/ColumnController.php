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
        $ss = $request -> input('sousuo');
        $data = DB::table('column') -> select('id','cname','pid','path','status','created_at','updated_at',DB::raw("concat(path,',',id) as paths")) -> where('cname','like','%'.$ss.'%') -> orderBy('paths','asc') -> paginate(5);
        foreach ($data as $key => $value) {
            // 统计字符串出现的次数
            $n = substr_count($value -> paths,',');
            $data[$key] -> cname = str_repeat('|----',$n).$value -> cname;
        }
        return view('/admin/column/index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sql = "select *,concat(path,',',id') as paths from column order by paths";
        $data = DB::table('column') -> select('id','cname','pid','path','status','created_at','updated_at',DB::raw("concat(path,',',id) as paths")) -> orderBy('paths','asc') -> get();
        foreach ($data as $key => $value) {
            // 统计字符串出现的次数
            $n = substr_count($value -> paths,',');
            $data[$key] -> cname = str_repeat('|----',$n).$value -> cname;
        }
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
        $this -> validate($request,[
                'cname' => 'required|unique:column',
            ],[
                'cname.required' => '栏目名称不能为空',
                'cname.unique' => '栏目名称重复',
            ]);
        $pid = $request -> input('pid',0);
        if ($pid == 0) {
            // 顶级分类
            $path = 0;
        }else{
            // 子分类
            $parent_data = Column::where('id',$pid) -> first();
            $path = $parent_data['path'].','.$parent_data['id'];
        }

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
        $data = Column::find($id);
        $datas = DB::table('column') -> select('id','cname','pid','path','status','created_at','updated_at',DB::raw("concat(path,',',id) as paths")) -> orderBy('paths','asc') -> get();
        foreach ($datas as $key => $value) {
            // 统计字符串出现的次数
            $n = substr_count($value -> paths,',');
            $datas[$key] -> cname = str_repeat('|----',$n).$value -> cname;
        }
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
        $this -> validate($request,[
                'cname' => 'required',
            ],[
                'cname.required' => '栏目名称不能为空',
            ]);
        $column = Column::where('pid',$id) -> first();
        if ($column) {
            return redirect('/admin/column') -> with('error','该分类下有子分类,不允许修改');
            exit;
        }

        $pid = $request -> input('pid',0);
        if ($pid == 0) {
            // 顶级分类
            $path = 0;
        }else{
            // 子分类
            $parent_data = Column::where('id',$pid) -> first();
            $path = $parent_data['path'].','.$parent_data['id'];
        }

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
        $res = Column::destroy($id);
        if ($res) {
            return redirect('/admin/column') -> with('success','删除成功');
        }else{
            return redirect('/admin/column') -> with('error','删除失败');
        }
    }
}
