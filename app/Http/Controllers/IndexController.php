<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function show(){

        if(view()->exists('default.index')){
            return view("default.index",['title'=>'Мои заметки','headtext'=>'Вас приветствует приложение "Мои 
            заметки". Оставляйте свои записи и с легкостью их редактируйте. В общем
            делайте с Вашими записами все что прийдет в голову, а мы Вам в этом поможем. Будьте с нами.',
                'button'=>'Начать работу']);

        }
        abort(404);
    }
}
