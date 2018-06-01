<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Models\Admin\Usersdetail;
use Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
       
        //
        echo  '当前访问的是后台用户列表页';
        //$data=DB::table('users')->get();
        //接收分页数据
        $count=$request->input('count',5);
        $for = $request -> input('for','');
        $params=$request->all();//以数组的形式接收所有的参数

        //dd($count);
        
        $data=User::
        where('username','like','%'.$for.'%')
        ->paginate($count);
        
        

        // //查询
        //var_dump($data); 
        return view('admin.users.index',['title'=>'用户列表','data'=>$data,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加视图
        return view('admin.users.create',['title'=>'用户添加']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        // $data = $request -> all();
        // 自动验证
         
        $this->validate($request,[
            'username'=>'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'phone'=>'required|regex:/^1[3-9]{1}[\d]{9}$/',
            'email' => 'required|email',
            'password' => 'required|between:6,12',
            'repassword' => 'required|same:password',
            'profile'=>'required',

            ],[
            'profile.required'=>'请点击上传头像',
            'username.unique'=>'该用户已经存在',
            'email.required' => '邮箱必填',
            'username.required' => '用户名必填必填',
            'phone.required' => '电话号码必填',
            'phone.regex' => '电话格式不正确',
            'email.email' => '用户名格式不正确',
            'email.unique' => '该用户已注册',
            'password.required' => '密码必须输入',
            'repassword.required' => '确认密码必须输入',
            'password.between' => '密码格式不正确',
            'repassword.same' => '密码不一致',
            'username.regex'=>'用户账号格式不正确',
            ]);

        /*dd($request->all());*/


        $data = $request ;//-> except('_token','profile');

       if($request->hasFile('profile')){
         $profile=$request->file('profile');
         //chu处理图片路径和图片名称
         //获取后缀
         $ext=$profile->getClientOriginalExtension();
         $temp_name=time().rand(1000,9999).'.'.$ext;
         //echo $temp_name;
         $dir_name='/uploads/'.date('Ymd',time());
         $name=$dir_name.'/'.$temp_name;//拼接路径方便存储
         //echo $name;
         $profile->move('.'.$dir_name,$temp_name);
         $data['profile']=$name;//把文件路径存到数据中然后下一步扔进数据库
         //dd($data);
      }

        //存入数据库
         //存放数据
        $user = new User;
            
        $data=[
            'profile'=>$name,//图片路径存放
            'username'=>$request->input('username',''),
            'password'=>Hash::make($request->input('password','')),
            'token'=>str_random(50),//随机50位加密字符串
            'identity'=>$request->input('identity',''),//默认2是普通用户

        ];
        //dd($name);
        //dd($data);
        //
       $uid= $user->insertGetId($data);
        $userdetail=new Usersdetail;
        $userdetail->uid=$uid;
        $userdetail->addr=$request->input('addr');
        $userdetail->email=$request->input('email');
        $userdetail->phone=$request->input('phone');
        $userdetail->ip=$_SERVER['REMOTE_ADDR']; 
        $userdetail->score=100;//用户默认积分
        $userdetail->sex=$request->input('sex');
        $userdetail->status=$request->input('status');;//用户默认开启

        $res2=$userdetail->save();

   





        if($uid && $res2){
           
            return redirect('/admin/users')->with('success','添加成功');
            
        }else{
          
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
        
        $data=User::find($id);

       
        // 模版
        return view('admin.users.show',['data'=>$data,'title'=>'详细信息']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         echo '您当前修改的是第'.$id.'条数据信息';
       
         $data=User::find($id);

         $data2=$data->usersdetail->where('uid',$id)->first();
        
        return view('admin.users.edit',['id'=>$id,'title'=>'修改用户信息','data'=>$data,'data2'=>$data2]);
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
        $data=$_POST;
        
         $data = $request -> except('_token','_method');
       //dd($data);
       if($request->hasFile('profile')){
         $profile=$request->file('profile');
         
         $ext=$profile->getClientOriginalExtension();
         $temp_name=time().rand(1000,9999).'.'.$ext;
        
         $dir_name='/uploads/'.date('Ymd',time());
         $name=$dir_name.'/'.$temp_name;//
         $profile->move('.'.$dir_name,$temp_name);
         $data['profile']=$name;
      }
        
        
       //修改分步修改
       $user= User::find($id);
        $user->username=$data['username'];
        $user->identity=$data['identity'];
        $user->save();  
        
        $user2=Usersdetail::where('uid',$id)->first();
      
        $user2->addr=$data['addr'];
        $user2->score=$data['score'];
        $user2->email=$data['email'];
        $user2->phone=$data['phone'];
        $user2->sex=$data['sex'];
        $user2->status=$data['status'];
        $user2->save();


       
       
         if($user && $user2){
           
            return redirect('/admin/users')->with('success','修改成功');
            
        }else{
          
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
    
       $user=User::destroy($id);
       $user2=Usersdetail::where('uid',$id)->delete();


        if($user && $user2){
           
            return redirect('/admin/users')->with('success','删除成功');
            
        }else{
          
           return back()->with('error','删除失败');
        }

    }
    /**
     * 后台拉黑用户方法
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function lahei($id,Request $request)
    {

        $user=Usersdetail::where('uid',$id)->first();
        $user->status=0;
        $user->save();
       return redirect('/admin/users')->with('success','该用户已经被拉入黑名单,管理员可以重新激活该账号');

    }
}
