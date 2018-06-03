<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Admin\Usersdetail;

/*use Illuminate\Foundation\Auth\AuthenticatesUsers;//引入完整的跳转回父页
use Illuminate\Support\Facades\URL;*/
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
       
       $formu= $request->input('username');
       $formp= $request->input('password');

          
        $user = User::where('username',$formu)->first();

        
        
          //如果数据库中没有此用户，返回登录页面
        if(!$user)
        {
            return back()->withErrors('没有这个用户') -> withInput();
        }
         $pwd=User::where('password',$formp)->first();

        if(!$pwd)
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

        //登录时间
     /* $abc= DB::table('loginhistory')->insert(['uid'=>$user->uid,'loginTime'=>time(),'ip'=>$_SERVER['REMOTE_ADDR']]);*/
/*  dd($abc);//true;*/
        return redirect('/admin/admin');//
            // return ('/home/index');
           
    
           /* return URL::previous();*/
    
        

        
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
