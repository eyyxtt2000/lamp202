<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Advertise;
use App\Http\Requests\StoreAdvertise;


class AdvertiseController extends Controller
{

    //返回广告详情
    public function index( Request $request )
    {
        //提示信息
        echo  '当前访问的是广告';

        //接收分页数据 默认为5
        $count=$request->input('count',5);

        //接收搜索数据 默认为空
        $for = $request -> input('for','');

        //以数组的形式接收分页和搜索数据，目的是返回给主页面
        $params=$request->all();

        //按照搜索查询数据，不传值全搜索。并进行分页
        $data = Advertise:: where('title','like','%'.$for.'%')->paginate($count);

        //返回视图
        return view('admin/advertise/index',['data'=>$data,'params'=>$params]);
    }


    //返回添加页面
    public function create()
    {
        return view('admin/advertise/create');
    }


    //处理添加页面提交的信息
    public function store(StoreAdvertise $request)
    {

        //接收所有数据
        $data = $request;

        //处理上传图片
        if($request->hasFile('image')){


            //获取上传图片信息
            $image=$request->file('image');

            //获取后缀
            $ext=$image->getClientOriginalExtension();

            //为图片起新名字
            $temp_name=time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;

            //设置路径名称
            $dir_name='/advertise_images/'.date('Ymd',time());

            //往数据库中存储的名字 拼接路径方便存储.
            $image_name=$dir_name.'/'.$temp_name;
            //echo $name;

            //将图片移动到框架中             路径  ，  名称
            //$image->move('.'.$dir_name,$temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['image_path']=$image_name;

        }


        //用模型方法添加数据
        //实例化模型
        $advertise = new Advertise;

        //向advertises数据表中添加title
        $advertise->title = $data['title'];

        //向advertises数据表中添加advertise_https
        $advertise->advertise_https = $data['advertise_https'];

        //向advertises数据表中添加status
        $advertise->status = $data['status'];

        //向advertises数据表中添加image_path
        $res=$advertise->image_path = $data['image_path'];

        //如果向数据库中插入数据成功，移动图片
        if($res){



            //将图片移动到框架中             路径  ，  名称
            $image->move('.'.$dir_name,$temp_name);
        }


        //保存
        $res = $advertise->save();

        if($res){
            return redirect('/admin/advertise')->with('success','添加成功');

        }else{

            return back()->with('error','添加失败');
        }
    }


    public function show($id)
    {
        //
    }


    //返回修改视图
    public function edit($id)
    {
        echo '您当前修改的是第'.$id.'条数据信息';
        $data=Advertise::find($id);

        return view('admin.advertise.edit',['data'=>$data]);
    }


    //更新广告信息
    public function update(Request $request, $id)
    {
        //接收所有数据
        $data = $request;

        //处理上传图片
        if($request->hasFile('image')){

            //获取上传图片信息
            $image=$request->file('image');

            //获取后缀
            $ext=$image->getClientOriginalExtension();

            //为图片起新名字
            $temp_name=time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;

            //设置路径名称
            $dir_name='/advertise_images/'.date('Ymd',time());

            //往数据库中存储的名字 拼接路径方便存储.
            $image_name=$dir_name.'/'.$temp_name;
            //echo $name;

            //将图片移动到框架中 ./links_images...

            $image->move('.'.$dir_name,$temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['image_path']=$image_name;

        }


        //用模型方法修改数据，获取当前id对应的数据
        $advertise = Advertise::find($id);

        //在更新图片之前获取原图片地址
        $filePath=$advertise->image_path;



        //向advertises数据表中添加advertise_https
        $advertise->advertise_https = $data['advertise_https'];

        //如果传数据了
        if($request->hasFile('image')) {

            unlink('.'.$filePath);
            $advertise->image_path = $data['image_path'];
        }

       //向advertises数据表中添加status
        $advertise->status = $data['status'];

        //保存
        $res = $advertise->save();

        if($res){

            //Storage::delete($filePath);
            return redirect('/admin/advertise')->with('success','修改成功');

        }else{

            return back()->with('error','修改失败');
        }

    }


    //删除广告
    public function destroy($id)
    {

        //用模型方法修改数据，获取当前id对应的数据
        $advertise = Advertise::find($id);

        //在删除图片之前获取原图片地址
        $filePath=$advertise->image_path;


        $res=Advertise::destroy($id);
        if($res){
            unlink('.'.$filePath);
            return redirect('/admin/advertise')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }


    //禁用广告
    public function disable($id,Request $request)
    {

        $user=Advertise::find($id);
        $user->status=0;
        $user->save();
        return redirect('/admin/advertise')->with('success','该广告已禁用');

    }

    //启用广告
    public function able($id,Request $request)
    {

        $user=Advertise::find($id);
        $user->status=1;
        $user->save();
        return redirect('/admin/advertise')->with('success','该广告已启用');

    }

    //广告分类
    public function adclass(Request $request)
    {

        return view('admin.advertise.class_create');

    }

}
