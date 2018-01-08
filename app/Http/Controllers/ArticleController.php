<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $notes = Article::all();
        return view('default.index',['articles' => $notes]);
    }
    public function create()
    {
        return view('create');
    }
}
