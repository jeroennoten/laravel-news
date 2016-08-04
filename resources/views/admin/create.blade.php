@extends('adminlte::page')

@section('title', 'Nieuws beheren')

@section('content_header')
    <h1>Nieuwsbericht maken</h1>
@stop

@section('content')
    <form method="post" action="{{ route('admin.news.store') }}">
        {{ csrf_field() }}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Nieuwsbericht</h3>
            </div>
            <div class="box-body">
                @include('news::admin.form', $article)
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.news.index') }}" class="btn btn-danger">
                    <i class="fa fa-remove"></i> Annuleren
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Opslaan
                </button>
            </div>
        </div>
    </form>
@endsection