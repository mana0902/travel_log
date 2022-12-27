<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts=Post::where('user_id',Auth::id())
         ->get();

        // dd($post);
        // $query = DB::table('users')->select('name');

        // $users = $query->addSelect('age')->get();
        // $post=Post::select('title','thumbnail','departure_day','return_day');
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Auth::id());
        //
        $request->validate([
            'title'=>'required|string|max:255',
            'departure_day'=>'required',
            'return_day'=>'required'
        ]);
        $post=Post::create(
            [
                'title'=>$request->title,
                'user_id'=>Auth::id(),
                'thumbnail'=>'',
                'departure_day'=>$request->departure_day,
                'return_day'=>$request->return_day
            ]
            );

        return redirect()
        ->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // public function show(Request $request, $id)

        // $value = $request->session()->all();
        // $queryParameters = $request->query();
        $id=$request->route('post');

        //

        $posts=Post::where('user_id',Auth::id())
         ->where('id', '=', $id)
         ->get();


         function dateCalculation($dateTime1,$dateTime2){
            $objDatetime1 = new DateTime($dateTime1);
            $objDatetime2 = new DateTime($dateTime2);

            $objInterval = $objDatetime1->diff($objDatetime2);
            return $num=$objInterval->format('%d');
            }
            $ary=[];
        foreach($posts as $post){
        $dateTime1=$post->departure_day;
        $dateTime2=$post->return_day;

        $num=dateCalculation($dateTime1,$dateTime2);

        for($i=0;$i<$num+1;$i++){
            $ary[]=['date'=> date('Y/m/d',strtotime("$dateTime1 + $i day"))];
            }
        }

        // dd($ary);


        return view('posts.show',['post' => $id],compact('ary'));
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
        $num=$id;
        return view('posts.edit',compact('num'));
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
