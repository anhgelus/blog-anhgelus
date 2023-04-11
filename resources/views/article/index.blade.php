@extends('base')

@section('title', 'Articles')

@section('hero-title', 'Articles')
@section('hero-subtitle', 'Retrouvez tous nos derniers articles !')

@section('content')
    @foreach($paginator->items() as $article)
        <article class="section">
            <h2 class="title is-3">{{ $article->title }}</h2>
            @if(!$article->tags->isEmpty())
                <p class="subtitle">
                    Tags :
                    @foreach($article->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                </p>
            @endif
            <p>
                {{ substr($article->content,0, 250) }}
            </p>
            <p class="mt-2">
                Lire <a href="{{ route('article.read', [$article->slug, $article->id]) }}">l'article</a> en entier
            </p>
        </article>
    @endforeach
@endsection
