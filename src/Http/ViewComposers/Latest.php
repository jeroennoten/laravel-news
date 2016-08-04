<?php


namespace JeroenNoten\LaravelNews\Http\ViewComposers;


use Illuminate\Contracts\View\View;
use JeroenNoten\LaravelNews\Models\Article;

class Latest
{
    public function compose(View $view)
    {
        $article = Article::latest()->first();
        $view->with(compact('article'));
    }
}
