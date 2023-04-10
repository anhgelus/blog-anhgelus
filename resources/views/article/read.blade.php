@extends('base')

@section('title', $article->title)

@section('content')
    <article class="section">
        <h2 class="title is-3">{{ $article->title }}</h2>
        <div class="md-parse">
            {{ substr($article->content,0, 250) }}
        </div>
    </article>
@endsection
