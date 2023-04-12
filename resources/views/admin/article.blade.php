@extends('base')

@section('title', 'Admin')

@section('hero-title', 'Administration')

@section('content')
    @include('admin.part.menu')
    <section class="section">
        <h3 class="title is-4">Statistiques</h3>
        <div class="columns">
            <div class="column">
                <p>
                    Nombre d'article : <strong>{{ $stats['post_total'] }}</strong>
                </p>
            </div>
            <div class="column">
                <p>
                    Nombre de tag : <strong>{{ $stats['tag_total'] }}</strong>
                </p>
            </div>
        </div>
    </section>
    <hr>
    <section class="section">
        <h3 class="title is-4">Gestion des articles</h3>
        <a class="button is-primary" href="{{ route('admin.article.new') }}">Nouvel article</a>
        @if($stats['post_total'] > 0)
            <h4 class="title is-5 mt-4">Liste des articles</h4>
            @foreach($articles as $article)
                <div class="mt-2 is-flex is-align-content-center is-align-items-center">
                    <p>
                        {{ $article->title }}
                    </p>
                    <div class="ml-auto">
                        <a class="button" href="{{ route('article.redirect',['id'=>$article->id]) }}">Voir</a>
                        <a class="button" href="{{ route('admin.article.edit',['post'=>$article->id]) }}">Éditer</a>
                        <a class="button is-danger is-outlined" href="{{ route('admin.article.delete', ['post'=>$article->id]) }}">Supprimer</a>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
@endsection
