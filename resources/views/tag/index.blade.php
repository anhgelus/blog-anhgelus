@extends('base')

@section('title', 'Tags')

@section('hero-title', 'Tags')
@section('hero-subtitle', 'Tous nos tags !')

@section('content')
    @foreach($tags as $tag)
        <article class="section">
            <h2 class="title is-3">{{ $tag->name }}</h2>
            <a class="mt-2 button is-link is-outlined" href="{{ route('tag.read', [\Illuminate\Support\Str::slug($tag->name), $tag->id]) }}">
                Voir les articles liés
            </a>
        </article>
    @endforeach
@endsection
