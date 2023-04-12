@extends('base')

@section('title','Bienvenue sur le Anhgelus Blog')

@section('hero-title', 'Bienvenue sur le Anhgelus Blog !')
@section('hero-subtitle', 'Mathématiques, technologies et jeux vidéos.')

@section('content')
    <div class="md-parse">
        {{Storage::disk('public')->get('info/home.md')}}
    </div>
    <h3 class="title is-3">
        Derniers articles
    </h3>
    <div class="columns is-multiline is-centered">
        @foreach($articles as $article)
            <div class="column">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{$article->title}}
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="md-parse preview">
                            {{ substr($article->content,0, 500) }}
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{route('article.redirect',['id'=>$article->id])}}" class="card-footer-item">Lire</a>
                    </footer>
                </div>
            </div>
        @endforeach
    </div>
@endsection
