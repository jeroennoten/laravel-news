@if(isset($article))
    @include('news::partials.preview', compact('article'))
@endif