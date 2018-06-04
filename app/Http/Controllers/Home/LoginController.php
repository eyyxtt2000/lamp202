<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Home\Users;
use App\Models\Home\UserDetail;
use DB;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //登录页
    public function getLogin()
    {
        
        return view('home.login.index');
    }
    //退出
    public function getLoginout()
    {
        session()->flush();
         return view('home.login.index');
    }

     public function getRegister()
    {
        
        return view('home.login.register');
    }
      public function index()
    {
        
       return view('home.index.index');
    }
//
    public function postDologin(Request $request)
    {
    
        //echo 1111111111;
        
          //登录成功
        
        $res = $request->   except('_token');
//dd($res); 打印出用户填写的账号密码
    
        $user = Users::where('username',$res['username'])->first();
//dd($user);//通过传过来的姓名(未来设置成唯一)查找出该用户的所有信息
       if(!$user)
        {
            return back()->withErrors('没有这个用户') -> withInput();
        }
      $id=$user->id;//得到该用户的id

        $pwd=Users::where('id',$id)->where('password',$res['password'])->first();
//dd($pwd);//判断id下的用户名和密码是否同时一致

        if($pwd==null)
        {
             return back()->withErrors('用户密码错误') -> withInput();
        }else{

               // $detail = UserDetail::find($id);
                $detail=DB::table('users_detail')->where('uid','=',$id)->get();
                //dd($detail[0]->status); 
                //dd($detail);//打印查到详细信息
                $status=$detail[0]->status;
                //dd($status);
                if ( $status == 0) {
                    return back()->withErrors('当前用户已被禁用，请您联系客服。') -> withInput();
                }
                session(['homeFlag'=>true]);
                session(['homeuser'=>$user]);
                //dd($user->profile);
                //dd(session('homeuser')['profile']);
                
                return redirect('/');

        }

      

       //登录时间
      /* $abc= DB::table('loginhistory')->insert(['uid'=>$user->uid,'loginTime'=>time(),'ip'=>$_SERVER['REMOTE_ADDR']]);*/
/*  dd($abc);//true;
       
 
     
        //验证密码
       /* if(Crypt::decrypt($user['password']) != trim($res['password']))
        {
            return back()->withErrors('密码错误') -> withInput();
        }*/




   }    
       
       ///////////////////////////
         //注册邮箱成功
/*    public function postDoregister(Request $request)
    {
        $res = $request->   except('_token');
        $rule = [
            'email' => 'required|email|unique:user_details,emill',
            'password' => 'required|between:6,12',
            'repwd' => 'same:password',
        ];
        $msg = [
            'email.required' => '用户名必填',
            'email.email' => '用户名格式不正确',
            'email.unique' => '该用户已注册',
            'password.required' => '密码必须输入',
            'password.between' => '密码格式不正确',
            'repwd.same' => '密码不一致',
        ];
        $validator = Validator::make($res,$rule,$msg);
        //如果验证失败

       // dd($validator);
        if($validator->fails()){
           /* return back() -> withErrors($validator) -> withInput();*/
        /*   echo'1111';
        }else{
            echo'222';
        }
           
        //存放数据
        $user = new Users();
        $user -> uname = $res['email'];
        $user -> password = \Crypt::encrypt($res['password']);
        $user -> identity = 2;
        $user -> save();
        $id = $user -> uid;


        $userdetail = new UserDetail();
        $userdetail -> uid = $id;
        $userdetail -> emill = $res['email'];
        $userdetail -> status = 1;//1是启用,0是禁用
        $userdetail -> user_token = $user -> password;
        $userdetail -> save();
        $userdetail -> uname = $user -> uname;

        Mail::send('emails.active', ['user' => $userdetail], function ($m) use ($userdetail) {
            $m->to($userdetail->emill,$userdetail -> uname)->subject('邮箱激活');
        });

        return view('home.login.login');

    }*/
    //邮箱激活
    /*public function active(Request $request)
    {
        $userid =   $request->input('userid');
        $token = $request->input('token');

//      根据userid获取用户
        $user =   UserDetail::find($userid);
//      验证token是否有效
        if($user->user_token == $token) {
            $re = $user->update(['status' => 1]);
        }
        return view('home.login.login');
    }*/
   
 
           
  
    

     
        
 

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
    public function getAbout(Request $request)
    {
        return view('home.index.about');
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
