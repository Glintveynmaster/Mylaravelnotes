<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ImageInt;
use App\Article;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $number = 1;
        $notes = Article::where('user_id',$user->id)->get();
        $images = Image::all();
//        $images = Image::whereHas('article',function($query){
//            $query->where('id',Article::first()->id);
//        })->get();
//        $i = $images->first()->id;
        $array = array('images'=>$images,'title'=>'Мой список заметок','user'=>$user, 'notes'=>$notes,
            'number'=>$number, 'headtext'=>'Привет '.$user->name.'! На этой странничке ты можешь просмотреть все свои 
            записи и настроить их так, как ты хочешь, если с первого раза не получилось ;)','button'=>'Новая заметка');

        return view('images.index',$array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr = array('title'=>'Добавить запись','headtext'=>'Yes',
            'button'=>'Why');
        return view('images.create', $arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path =public_path().'\upload\\';
        $file = $request->file('file');
        Auth::user()->notes()->create(['title' => $request->title, 'text' => $request->text]);
        $article = Article::all()->last();
        if(!empty($file)) {
            foreach ($file as $f) {
                $filename = str_random(20) . '.' . $f->getClientOriginalExtension() ?: 'png';
                $img = ImageInt::make($f);
                $img->resize(100, 100)->save($path . $filename);
                Auth::user()->images()->create(['img' => $filename, 'article_id' => $article->id]);
            }
        }
        return redirect()->back()->with('message', 'Запись успешно добавлена');
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

    }

}
