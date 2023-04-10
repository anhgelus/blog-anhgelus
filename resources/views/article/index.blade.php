@extends('base')

@section('title', 'Articles')

@section('content')
    @foreach($paginator->items() as $article)
        <article class="section">
            <h2 class="title is-3">{{ $article->title }}</h2>
            <p>
                {{ substr($article->content,0, 250) }}
            </p>
            <p class="mt-2">
                Lire <a href="{{ route('article.read', [$article->slug, $article->id]) }}">l'article</a>
            </p>
        </article>
    @endforeach
@endsection
