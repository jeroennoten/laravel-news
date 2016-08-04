<article>
    <header>
        <aside class="date">@timestamp($article->date, '%e %B %Y')</aside>
        <h2>{{ $article->title }}</h2>
    </header>
    {!! $article->summary !!}
    <p><a href="{{ route('news.show', $article) }}">Lees meer...</a></p>
</article>
