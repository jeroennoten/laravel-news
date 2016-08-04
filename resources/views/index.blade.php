@extends('layouts.news')

@section('news')

    @foreach($articles as $article)
        @include('news::partials.preview', compact('article'))
    @endforeach

    {{ $articles->links() }}

@endsection