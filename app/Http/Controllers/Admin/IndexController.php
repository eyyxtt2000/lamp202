<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //加载后台页面
       return view('admin.index.index');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function writepwd(Request $request)
    {


       if( session() ){
            $id = session('adminUser')->id;

         }
 
       

        return view('admin.resetpwd.resetpwd',['id'=>$id,'title'=>'修改密码']);

    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function resetpwd(Request $request,$id)
    {


        $oldpwd=$request->input('oldpwd');
        $newpwd=$request->input('newpwd');
        $confirmpwd=$request->input('confirmpwd');
        if($oldpwd==null || $newpwd==null || $confirmpwd==null)
        {
             return back()->withInput();
        }

        $user=User::where('id',$id)->first();
        $datapwd=$user->password;

        $res=Hash::check($oldpwd,$datapwd);

        if(!$res)
        {
            return back()->withInput();
        }

        if($confirmpwd!=$newpwd)
        {
            return back()->withInput();
        }

        $user->password=Hash::make($newpwd);
        $user->save();
        return redirect('/admin/login');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
    }

}
