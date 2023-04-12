@extends('base')

@section('title', $article->title)

@section('hero-title', $article->title)
@if(!$article->tags->isEmpty())
    @section('hero-subtitle')
        Tags :
        @foreach($article->tags as $tag)
            <a class="is-info button ml-2" href="{{route('tag.redirect', ['tag'=>$tag->id])}}">{{ $tag->name }}</a>
        @endforeach
    @endsection
@endif

@section('content')
    <article class="section">
        <h2 class="title is-3">{{ $article->title }}</h2>
        <div class="md-parse">
            {{ $article->content}}
        </div>
    </article>
@endsection
