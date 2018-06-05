<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\FriendlyLink;
use App\Models\Admin\Articles;
use App\Models\Home\Comment;
use App\Models\Admin\User;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friend=FriendlyLink::all();
        $hot = Articles::orderBy('comment','desc') -> take(5) -> get();
        $articles_new=Articles::orderBy('created_at','desc')->get();
        foreach ($articles_new as $key => $value) {
            $content = $value['content'];
            $preg = "/<img(.*?)>/i"     ;
            $value['content'] = preg_replace($preg,'', $content);
            $value['content'] = strip_tags($value['content']);
        }

      //dump($articles_new);
       return view('home.index',['friend'=>$friend,'articles_new'=>$articles_new,'hot' => $hot]);
    }


     public function board()
    {
        return view('home.board');
    }
      public function about()
    {
        return view('home.about');
    }
      public function mood()
    {
        $data = Articles::orderBy('created_at','desc')->get();

        foreach ($data as $k => $v) {
            $content=$v['content'];
            $preg = "/<img(.*?)>/i"     ;
            $v['content'] = preg_replace($preg,'', $content);
            $v['content'] = strip_tags($v['content']);
        }

        return view('home.mood',['data' => $data]);
    }
      public function article()
    {
        $data = Articles::orderBy('created_at','desc')->get();
        foreach ($data as $k => $v) {
            $content=$v['content'];
            $preg = "/<img(.*?)>/i"     ;
            $v['content'] = preg_replace($preg,'', $content);
            $v['content'] = strip_tags($v['content']);
        }
        return view('home.article',['data' => $data]);
    }
      public function articledetail($id)
    {
        $comment = Comment::where('aid',$id)->orderby('created_at','desc')->get();
        foreach ($comment as $k => $v) {
            $comment[$k] -> content = strip_tags($comment[$k] -> content);
        }
        $detail=Articles::find($id);
        $previd= Articles::where('id', '<', $id)->max('id');
        $prev = Articles::find($previd);
        $nextid=Articles::where('id', '>', $id)->min('id');
        $next = Articles::find($nextid);
        return view('home.articledetail', ['detail'=>$detail,'prev'=>$prev,'next'=>$next,'comment'=>$comment]);
    }

    public function comment(Request $request,$id)
    {
        $content = $request -> content;
        $comment = new Comment;
        $comment -> uid = session('homeuser') -> id;
        $comment -> content = $content;
        $comment -> aid = $id;
        $comment -> pid = 0;
        $comment -> save();
        $articles = Articles::where('id',$id) -> first();
        $articles -> comment = \DB::table('comment') -> where('aid', $id) -> count();
        $articles -> save();
        return back();
    }

    public function recomment(Request $request,$id)
    {
        $this -> validate($request,[
                'content' => 'required',
            ],[
                'content.required' => '评论内容不能为空',
            ]);
        $content = $_POST['content'];
        $data = Comment::where('id',$id) -> first();
        $aid = $data -> aid;
        $comment = new Comment;
        $comment -> uid = session('homeuser') -> id;
        $comment -> content = $content;
        $comment -> aid = $aid;
        $comment -> pid = $id;
        $res = $comment -> save();
        $articles = Articles::where('id',$aid) -> first();
        $articles -> comment = \DB::table('comment') -> where('aid', $aid) -> count();
        $articles -> save();
        if ($res) {
            return back() -> with('success','评论成功');
        }else{
            return back() -> with('error','评论失败');
        }
    }

     public function logout()
    {
         session()->flush();
         session(['homeFlag'=>false]);
         return redirect('/');
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
