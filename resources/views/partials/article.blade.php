<article>
    <header>
        <aside class="date">@timestamp($article->date, '%e %B %Y')</aside>
        <h2>{{ $article->title }}</h2>
    </header>
    {!! $article->body !!}
</article>
