@extends('layouts.news')

@section('news')

    @include('news::partials.article', compact('article'))

@endsection