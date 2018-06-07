<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Admin\Usersdetail;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo'后台登录页';
        return view('admin.login.login');
    }


    public function dologin(Request $request)
    {
        $form= $request->except('_token');

        $user = User::where('username',$form['username'])->first();

       $formu= $request->input('username');
       $formp= $request->input('password');
     

        $user = User::where('username',$formu)->first();
    
          //如果数据库中没有此用户，返回登录页面
        if(!$user)
        {
            return back()->withErrors('没有这个用户') -> withInput();
        }

        $res=Hash::check($formp,$user['password']);
        
        if(!$res)
        {
             return back()->withErrors('用户密码错误') -> withInput();
        }
         $coderes= checkcode($request->input('code'));
         if(!$coderes)
        {
            return back()->withErrors('验证码错误') -> withInput();
        }

        $id=$user['id'];
        $res = Usersdetail::where('uid',$id)->first();



        if ( $res['status'] == 0 ) {
            return back()->withErrors('当前用户已被禁用，请您联系客服。') -> withInput();
        }

        session(['adminFlag'=>true]);
        session(['adminUser'=>$user]);

      
    
        return redirect('/admin/admin');//
           

    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        session()->flush();
        session(['adminFlag'=>false]);
        return redirect('admin/login');
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
     * 进行判断.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
