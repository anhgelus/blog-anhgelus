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
    <section class="section">
        <h3 class="title is-4">Gestion des tags</h3>
        <a class="button is-primary" href="{{ route('admin.tags.new') }}">Nouveau tag</a>
        @if($stats['post_total'] > 0)
            <h4 class="title is-5 mt-4">Liste des articles</h4>
            @foreach($tags as $tag)
                <div class="mt-2 is-flex is-align-content-center is-align-items-center">
                    <p>
                        {{ $tag->name }}
                    </p>
                    <div class="ml-auto">
                        <a class="button" href="{{ route('admin.tags.edit',['post'=>$tag->id]) }}">Éditer</a>
                        <a class="button is-danger is-outlined" href="{{ route('admin.tags.delete', ['post'=>$tag->id]) }}">Supprimer</a>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
@endsection
