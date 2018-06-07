<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Home\Users;
use App\Models\Home\UserDetail;
use DB;
use Mail;
use Hash;
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
//dd($res); //打印出用户填写的账号密码

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

                //dd($detail);
                //dd($detail[0]->status);
                //dd($detail);//打印查到详细信息
                $status=$detail[0]->status;
                //dd($status);
                if ( $status == 0) {
                    return back()->withErrors('当前用户已被禁用，请您联系客服。') -> withInput();
                }
                session(['homeFlag'=>true]);
                session(['homeuser'=>$user]);
                //dd(session('homeuser'));
               $abc= DB::table('history')->insert(['uid'=>$user->id,'loginTime'=>time()]);
              //dd($abc);//true;
                //dd($user->profile);
                //dd(session('homeuser')['profile']);

                return redirect('/');

        }



       //登录时间




        //验证密码
       /* if(Crypt::decrypt($user['password']) != trim($res['password']))
        {
            return back()->withErrors('密码错误') -> withInput();
        }*/




   }
        public function postDoregister(Request $request)
        {
           /* echo'在这里处理注册信息';
             //验证数据  // 将数据插入数据库
             dump($request -> all());*/
              $this->validate($request,[
            'email' => 'required|email|unique:users_detail',
            'password' => 'required|between:6,12',
            'repassword' => 'required|same:password',

            ],[
            'email.required' => '邮箱必填',
            'email.email' => '用户名格式不正确',
            'email.unique' => '该用户已注册',
            'password.required' => '密码必须输入',
            'repassword.required' => '确认密码必须输入',
            'password.between' => '密码格式不正确',
            'repassword.same' => '密码不一致',
            ]);



            $email = $request -> input('email','1453175095@qq.com');
            $pass = Hash::make($request -> input('password','123'));
            $profile='/homeblog/img/timg.jpg';//给个默认头像
            $token = str_random(50);
            $id = Users::insertGetId(['profile'=>$profile,'username'=>$email,'password'=>$pass,'token'=>$token]);
            UserDetail::insert(['email'=>$email,'uid'=>$id]);



            // dd($id);

            // 发送邮件
            if($id > 0){
                // 注册成功
                self::sendEmail($email,$id,$token);
                 return view('home.email.send',['time'=>date( 'Y年m月d日 H:i:s',time() )]);
            }else{
                // 注册失败
                 return view('home.email.fail',['time'=>date( 'Y年m月d日 H:i:s',time() )]);
                dd('注册失败');
            }
        }

        public function jihuo(Request $request)
            {

               // 接受id
                $id = $request -> input('id','');
                // 接受token
                $token = $request -> input('token','');
                // 通过id获取插入的对应数据
                $user = Users::find($id);
               // dd($user);
                if(!$user){
                     return view('home.email.fail',['time'=>date( 'Y年m月d日 H:i:s',time() )]);
                    dd('连接非法');
                }
                // dump($user);


                // 检测该账户是否激活
                if($user -> active == 2){
                    $uid=$user->id;//获取details里的uid
                    $email=DB::select("select email from users_detail where uid=".$uid);
                  /* $email=$email[0]->email;
                   $email=sprintf($email);
                    //dd($email);*/
                    date_default_timezone_set('PRC');
                    return view('home.email.oready',['time'=>date( 'Y年m月d日 H:i:s',time() )]);
                    dd('该账户已经激活，请不要重复激活');
                }
                // 激活
                $user -> active  = 2;
                $user -> token = str_random(50);
                if($user -> save()){
                    return view('home.email.success',['time'=>date( 'Y年m月d日 H:i:s',time() )]);
                    dd('激活成功');
                }else{
                    return view('home.email.fail',['time'=>date( 'Y年m月d日 H:i:s',time() )]);
                    dd('激活失败');
                }
                 // 检测连接的有效性
                if($token != $user->token){
                     return view('home.email.fail',['time'=>date( 'Y年m月d日 H:i:s',time() )]);
                    dd('链接失效，请联系客服');
                    exit;
                }
            }

            public static function sendEmail($email,$id,$token)
            {
                Mail::send('home.email.index', ['id' => $id,'token'=>$token,'email'=>$email], function ($m) use ($email) {
                    $m->to($email)->subject('【JDQS】官方激活邮件!');
                });
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
