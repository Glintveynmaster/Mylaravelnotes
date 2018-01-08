<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Image;
use Intervention\Image\Facades\Image as ImageInt;
use Illuminate\Support\Facades\Auth;

class UpdatePostController extends Controller
{
    public function show(Request $request, $id){
        $article = Article::find($id);
        $walls = Image::where('article_id',$article->id)->get();
        $array = array('title'=>'Редактирование материала','article'=>$article, 'walls'=>$walls,'headtext'=>'Yes',
            'button'=>'Why');
        return view('default.update',$array);

    }

    public function create(Request $request){
        $user = Auth::user();
        $data = $request->except('_token');
        $article = Article::find($data['id']);
        $article->title = $data['title'];
        $article->text = $data['text'];
        
        $res = $user->notes()->save($article);
        $path =public_path().'\upload\\';
        $file = $request->file('file');

        if(!empty($file)) {
            foreach ($file as $f) {
                $filename = str_random(20) . '.' . $f->getClientOriginalExtension() ?: 'png';
                $img = ImageInt::make($f);
                $img->resize(100, 100)->save($path . $filename);
                Auth::user()->images()->create(['img' => $filename, 'article_id' => $article->id]);
            }
        }
        return redirect()->back()->with('message', 'Материал обновлен');
    }

    public function delt($id){
        $article = Article::find($id);
        $images = Image::where('article_id',$article->id);
        if(!empty($article) && !empty($images)){
            $images->delete();
            $article->delete();
            return redirect()->back()->with('message','Запись успешно удалена');
        }
    }

    public  function deleteOne($id){
        $image = Image::find($id);
        $image->delete();
        return redirect()->back();
    }
}
