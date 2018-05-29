<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Column;

class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Column::all();
        return view('/admin/column/index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/column/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cname = $request -> cname;
        $column = new Column;
        $column -> cname = $cname;
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
        return view('/admin/column/edit',['data' => $data]);
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
        $column = Column::find($id);
        $column -> cname = $request -> cname;
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
        $column = Column::find($id);
        $res = $column -> delete();
        if ($res) {
            return redirect('/admin/column')->with('success','删除成功');
        }else{
            return redirect('/admin/column')->with('error','删除失败');
        }
    }
}
