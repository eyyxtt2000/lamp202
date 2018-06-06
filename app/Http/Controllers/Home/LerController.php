<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Home\Users;
class LerController extends Controller
{
    public function uploads(Request $request)
    {
        /*echo 1;
        exit;*/

        if($request->hasFile('profile')){
            $profile=$request->file('profile');
            $dir_name='./uploads/'.date('Ymd');
            $file_name=str_random(20);
            $hz=$profile->getClientOriginalExtension();
            $name=$file_name.'.'.$hz;
            $res=$profile->move($dir_name,$name);
            //dump($res);
            if($res){
                $id=session('homeuser')['id'];
               
                $user=Users::find($id);
                //dd($user);
               $user->profile=trim($dir_name.'/'.$name,'.');
               $user->save();
              
                $arr=[
                    'code'=>1,
                    'msg'=>'上传成功',
                    'data'=>[
                     'src'=> trim($dir_name.'/'.$name,'.')
                    ],
                ];
               

               }else{
                     $arr=[
                    'code'=>0,
                    'msg'=>'上传失败',
                    'data'=>[
                        'src'=>'' 
                    ],
                ];
            }
           
        }

        //处理返回值
        echo json_encode($arr);
    } 

}
