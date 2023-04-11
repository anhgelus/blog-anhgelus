@extends('base')

@section('title', $article->title)

@section('hero-title', $article->title)
@section('hero-subtitle', substr($article->content,0, 50))

@section('content')
    <article class="section">
        <h2 class="title is-3">{{ $article->title }}</h2>
        <div class="md-parse">
            {{ $article->content}}
        </div>
    </article>
@endsection
