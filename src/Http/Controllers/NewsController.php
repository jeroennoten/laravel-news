<?php


namespace JeroenNoten\LaravelNews\Http\Controllers;


use Illuminate\Routing\Controller;
use JeroenNoten\LaravelNews\Models\Article;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);
        return view('news::index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('news::show', compact('article'));
    }
}