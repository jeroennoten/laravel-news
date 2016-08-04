<?php


namespace JeroenNoten\LaravelNews\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use JeroenNoten\LaravelNews\Models\Article;

class NewsAdminController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('news::admin.index', compact('articles'));
    }

    public function create()
    {
        $article = new Article;
        return view('news::admin.create', compact('article'));
    }

    public function store(Request $request, Redirector $redirector)
    {
        Article::create($request->all());
        return $redirector->route('admin.news.index');
    }

    public function edit(Article $article)
    {
        return view('news::admin.edit', compact('article'));
    }

    public function update(Article $article, Request $request, Redirector $redirector)
    {
        $article->update($request->all());
        return $redirector->route('admin.news.index');
    }

    public function destroy(Article $article, Redirector $redirector)
    {
        $article->delete();
        return $redirector->route('admin.news.index');
    }
}