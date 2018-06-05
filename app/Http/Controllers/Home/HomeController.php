<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\FriendlyLink;
use App\Models\Admin\Articles;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //分配友链数据
        $friend=FriendlyLink::all();

        $articles_new=Articles::orderBy('created_at','desc')->get();

        foreach ($articles_new as $key => $value) {
            
            
            $content=$value['content'];
            $preg = "/<img(.*?)>/i"     ;
            $value['content'] = preg_replace($preg,'', $content);
        }
      //dump($articles_new);
      //分配访客历史信息
     // $query=" distinct(uid) ";
        $visitor=DB::select('select distinct(uid) from history order by(loginTime) desc ');
        $var=[];
        foreach ($visitor as $k => $v) {
            $uid=$v->uid;
            $src=DB::select('select profile from users where id='.$uid);
            
            $var[$k]=$src;
        }
        

       //dd('123');
      //dd($var);

      // dd($var);
       return view('home.index',['friend'=>$friend,'articles_new'=>$articles_new,'var'=>$var]);
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
        return view('home.mood');
    }
      public function article()
    {
        return view('home.article');
    }
      public function articledetail($id)
    {


        $collect=DB::table('collect')->where('aid',$id)->where('uid',session('homeuser')['id'])->first();

        $detail=Articles::find($id);
        $previd= Articles::where('id', '<', $id)->max('id');
        $prev = Articles::find($previd);
        $nextid=Articles::where('id', '>', $id)->min('id');
        $next = Articles::find($nextid);
        return view('home.articledetail', ['collect'=>$collect,'detail'=>$detail,'prev'=>$prev,'next'=>$next]);

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
