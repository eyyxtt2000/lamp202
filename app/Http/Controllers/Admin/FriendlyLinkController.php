<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Advertise;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\FriendlyLink;
use App\Http\Requests\StoreFriendlyLink;
use Illuminate\Support\Facades\Storage;


//当前控制器为友情链接控制器
class FriendlyLinkController extends Controller
{

    //友情链接详情表页，包括分页搜索功能
    public function index(Request $request )
    {
        //提示信息
        echo  '当前访问的是友情链接列表页';

        //接收分页数据 默认为5
        $count=$request->input('count',5);

        //接收搜索数据 默认为空
        $for = $request -> input('for','');

        //以数组的形式接收分页和搜索数据，目的是返回给主页面
        $params=$request->all();

        //按照搜索查询数据，不传值全搜索。并进行分页
        $data = FriendlyLink:: where('title','like','%'.$for.'%')->paginate($count);

        //返回视图
        return view('admin/links/index',['data'=>$data,'params'=>$params]);

    }


    //返回添加链接页面 方法
    public function create()
    {
        return view('admin/links/create');
    }



    //处理添加链接的数据 方法 验证处理类
    public function store(StoreFriendlyLink  $request)
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
            $dir_name='/links_images/'.date('Ymd',time());

            //往数据库中存储的名字 拼接路径方便存储.
            $image_name=$dir_name.'/'.$temp_name;
            //echo $name;

            //将图片移动到框架中             路径  ，  名称
            $image->move('.'.$dir_name,$temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['image_path']=$image_name;

        }


            //用模型方法添加数据
            //实例化模型
            $friendlylinks = new FriendlyLink;

            //向friendlylinks数据表中添加title
            $friendlylinks->title = $data['title'];

            //向friendlylinks数据表中添加friendly_https
            $friendlylinks->friendly_https = $data['friendly_https'];

            //向friendlylinks数据表中添加image_path
            $friendlylinks->image_path = $data['image_path'];

            //向friendlylinks数据表中添加status
            $friendlylinks->status = $data['status'];

            //保存
            $res = $friendlylinks->save();

            if($res){
                return redirect('/admin/friendlylink')->with('success','添加成功');

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
        echo '您当前修改的是第'.$id.'条数据信息';
        $data=FriendlyLink::find($id);

        return view('admin.links.edit',['data'=>$data]);
    }


    //修改更新数据
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
            $dir_name='/links_images/'.date('Ymd',time());

            //往数据库中存储的名字 拼接路径方便存储.
            $image_name=$dir_name.'/'.$temp_name;
            //echo $name;

            //将图片移动到框架中 ./links_images...
            $image->move('.'.$dir_name,$temp_name);

            //把文件路径存到数据中然后下一步扔进数据库
            $data['image_path']=$image_name;

        }


        //用模型方法修改数据，获取当前id对应的数据
        $friendlylinks = FriendlyLink::find($id);

        //在更新图片之前获取原图片地址
        $filePath=$friendlylinks->image_path;




        //向friendlylinks数据表中添加friendly_https
        $friendlylinks->friendly_https = $data['friendly_https'];

        if($request->hasFile('image')) {
            //判断是否有文件上传
            //向friendlylinks数据表中添加image_path,并删除原图片

            unlink('.'.$filePath);
            $friendlylinks->image_path = $data['image_path'];
        }
        //向friendlylinks数据表中添加status
        $friendlylinks->status = $data['status'];

        //保存
        $res = $friendlylinks->save();

        if($res){

            //Storage::delete($filePath);
            return redirect('/admin/friendlylink')->with('success','修改成功');

        }else{

            return back()->with('error','修改失败');
        }

    }


    //删除数据
    public function destroy($id)
    {

        //用模型方法修改数据，获取当前id对应的数据
        $friendly_link = FriendlyLink::find($id);

        //在删除图片之前获取原图片地址
        $filePath=$friendly_link->image_path;


        $res=FriendlyLink::destroy($id);
        if($res){

            unlink('.'.$filePath);

            return redirect('/admin/friendlylink')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }


    //禁用链接
    public function disable($id,Request $request)
    {

        $user=FriendlyLink::find($id);
        $user->status=0;
        $user->save();
        return redirect('/admin/friendlylink')->with('success','该链接已禁用');

    }

    //启用链接
    public function able($id,Request $request)
    {

        $user=FriendlyLink::find($id);
        $user->status=1;
        $user->save();
        return redirect('/admin/friendlylink')->with('success','该链接已启用');

    }
}
