<?php

namespace JeroenNoten\LaravelNews\Http\Controllers;

use Illuminate\Routing\Controller;
use JeroenNoten\LaravelNews\Models\Article;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::where('published', true)->paginate(5);

        return view('news::index', compact('articles'));
    }

    public function show(Article $article)
    {
        if ($article->notPublished()) {
            throw new NotFoundHttpException;
        }

        return view('news::show', compact('article'));
    }
}