<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Date;
use App\Models\Schedule;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Storage;
use InterventionImage;


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
        // dd($request->file('thumbnail'));
        $imageFile = $request->file('thumbnail');
        if(!is_null($imageFile)){
        $resizedImage = InterventionImage::make($imageFile)
        ->resize(1920, 1080)->encode();

        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToPost = $fileName. '.' . $extension;
        Storage::put('public/posts/' . $fileNameToPost,$resizedImage);
        }elseif(is_null($imageFile)){
        $fileNameToPost='';
        }
        $request->validate([
            'title'=>'required|string|max:255',
            'departure_day'=>'required',
            'return_day'=>'required'
        ]);

        $post=Post::create(
            [
                'title'=>$request->title,
                'user_id'=>Auth::id(),
                'thumbnail'=>$fileNameToPost,
                'departure_day'=>$request->departure_day,
                'return_day'=>$request->return_day
            ]
            );

            function dateCalculation($dateTime1,$dateTime2){
                $objDatetime1 = new DateTime($dateTime1);
                $objDatetime2 = new DateTime($dateTime2);

                $objInterval = $objDatetime1->diff($objDatetime2);
                return $num=$objInterval->format('%d');
                }


            $dateTime1=$request->departure_day;
            $dateTime2=$request->return_day;

            $num=dateCalculation($dateTime1,$dateTime2);

            for($i=0;$i<$num+1;$i++){
            $date=date('Y/m/d',strtotime("$dateTime1 + $i day"));
            $date_table=Date::create(
                [
                    'date'=>$date,
                    'post_id'=>$post->id
                ]
                );}

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

        $posts=Post::where('user_id','=',Auth::id())
         ->where('id', '=', $id)
         ->get();

        $dates=Date::where('post_id','=',$id)
        ->get();
        $schedule=[];
        foreach($dates as $date){
            $schedule[]=Schedule::where('date_id','=',$date->id)
            ->get();
        }
        // for($i=0;$i<count($schedule);$i++){
        //     for($j=0;$j<count($schedule[$i]);$j++)
        //     if($schedule[$i][$j]->date_id==$key->id)
        // }

        // dd($schedule[0]);

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
        // for($i=0;$i<$num+1;$i++){
        // $date=date('Y/m/d',strtotime("$dateTime1 + $i day"));
        // Date::create(
        //     [
        //         'date'=>$date,
        //         'post_id'=>$id,
        //     ]
        //     );

        // dd($ary);


        return view('posts.show',['post' => $id],compact('ary','id','dates','schedule'));
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
        $post=Post::findOrFail($id);
        return view('posts.edit',compact('post'));
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

        $post=Post::findOrFail($id);
        $post->title=$request->title;
        $post->departure_day=$request->departure_day;
        $post->return_day=$request->return_day;

        $imageFile = $request->file('thumbnail');
        if(!is_null($imageFile)){
        $resizedImage = InterventionImage::make($imageFile)
        ->resize(1920, 1080)->encode();

        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToPost = $fileName. '.' . $extension;
        Storage::put('public/posts/' . $fileNameToPost,$resizedImage);
        }
        $post->thumbnail=$fileNameToPost;


        $post->save();
        return redirect()
        ->route('posts.index');
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
