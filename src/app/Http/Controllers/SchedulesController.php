<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Date;
use App\Models\Schedule;
use InterventionImage;
use DateTime;
use Illuminate\Support\Facades\Storage;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('schedules.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //

        $post_id=$request->route('post');
        $date_id=$request->route('date');

        return view('schedules.create',compact('post_id','date_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        //

        function createImagefileName($request,$filenum){
            $imageFile = $request->file('filename_'.$filenum);
        if(!is_null($imageFile)){
        $resizedImage = InterventionImage::make($imageFile)
        ->resize(1920, 1080)->encode();

        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToPost = $fileName. '.' . $extension;
        Storage::put('public/schedules/' . $fileNameToPost,$resizedImage);
        return $fileNameToPost;
        }elseif(is_null($imageFile)){
        return $fileNameToPost=NULL;
        }
        }
        $fileNameToPost_1='';
        $fileNameToPost_2='';
        $fileNameToPost_3='';
        $fileNameToPost_4='';

        for($i=1;$i<5;$i++){
            $name='fileNameToPost_'.$i;
            $$name=createImagefileName($request,$i);
        }
        $post_id=$request->route('post');
        $posts=Post::where('user_id',Auth::id())
         ->where('id', '=', $post_id)
         ->get();
        $date_id=$request->route('date');

        // $request->validate([
        //     'start_time'=>'required',
        //     'end_time'=>'required',
        //     'return_day'=>'required'
        // ]);


        $schedule=Schedule::create([
            'date_id'=>$date_id,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'filename_1'=>$fileNameToPost_1,
            'filename_2'=>$fileNameToPost_2,
            'filename_3'=>$fileNameToPost_3,
            'filename_4'=>$fileNameToPost_4,
            'destination'=>$request->destination,
            'comment'=>$request->comment]
        );
        $schedule->save();
        return redirect()
        ->route('posts.show',['post'=>$post_id]);
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
    public function edit(Request $request)
    {
        //
        $schedule_id=$request->route('schedule');
        $post_id=$request->route('post');
        $date_id=$request->route('date');
        $schedule=Schedule::findOrFail($schedule_id);

        return view('schedules.edit',compact('schedule','schedule_id','post_id','date_id'));
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


        function createImagefileName($request,$filenum){
            $imageFile = $request->file('filename_'.$filenum);
        if(!is_null($imageFile)){
        $resizedImage = InterventionImage::make($imageFile)
        ->resize(1920, 1080)->encode();

        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToPost = $fileName. '.' . $extension;
        Storage::put('public/posts/' . $fileNameToPost,$resizedImage);
        return $fileNameToPost;
        }elseif(is_null($imageFile)){
        return $fileNameToPost='';
        }
        }
        $fileNameToPost_1='';
        $fileNameToPost_2='';
        $fileNameToPost_3='';
        $fileNameToPost_4='';

        for($i=1;$i<5;$i++){
            $name='fileNameToPost_'.$i;
            $$name=createImagefileName($request,$i);
        }
        $schedule_id=$request->route('schedule');
        $post_id=$request->route('post');


        $schedule=Schedule::findOrFail($schedule_id);

        $schedule->start_time=$request->start_time;
        $schedule->end_time=$request->end_time;
        $schedule->filename_1=$fileNameToPost_1;
        $schedule->filename_2=$fileNameToPost_2;
        $schedule->filename_3=$fileNameToPost_3;
        $schedule->filename_4=$fileNameToPost_4;
        $schedule->destination=$request->destination;
        $schedule->comment=$request->comment;

        $schedule->save();

        return redirect()
        ->route('posts.show',['post'=>$post_id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $post_id=$request->route('post');
        $schedule_id=$request->route('schedule');

        $schedule=Schedule::findOrFail($schedule_id);
        $schedule->delete();

        return redirect()
        ->route('posts.show',['post'=>$post_id]);
    }
}
