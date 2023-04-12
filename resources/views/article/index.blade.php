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
            <p class="md-parse preview">
                {{ substr($article->content,0, 250) }}
            </p>
            <a class="mt-2 button is-link is-outlined" href="{{ route('article.read', [$article->slug, $article->id]) }}">
                Lire l'article
            </a>
        </article>
    @endforeach
    <div class="ml-auto is-flex is-flex-direction-row-reverse">
        @if($paginator->hasMorePages())
            <a class="button is-primary" href="{{$paginator->nextPageUrl()}}">Suite</a>
        @endif
        @if(!$paginator->onFirstPage())
            <a class="button is-primary is-outlined mr-3" href="{{$paginator->previousPageUrl()}}">Précédent</a>
        @endif
    </div>
@endsection
