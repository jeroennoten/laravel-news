@extends('adminlte::page')

@section('title', 'Nieuws beheren')

@section('content_header')
    <h1>Nieuws beheren</h1>
@stop

@section('content')
    <a href="{{ route('admin.news.create') }}" class="btn btn-success margin-bottom">
        <i class="fa fa-plus"></i> Nieuwsbericht maken
    </a>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Nieuwsberichten</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin table-hover">
                    <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Datum</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr style="cursor: pointer;"
                            onclick="location.href = '{{ route('admin.news.edit', $article) }}';">
                            <td>
                                {{ $article->title }}
                            </td>
                            <td>
                                @timestamp($article->date)
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection