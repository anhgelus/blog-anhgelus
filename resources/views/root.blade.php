@extends('base')

@section('title','Bienvenue sur le Anhgelus Blog')

@section('hero-title', 'Bienvenue sur le Anhgelus Blog !')
@section('hero-subtitle', 'Mathématiques, technologies et jeux vidéos.')

@section('content')
    <div class="md-parse">
        {{Storage::disk('public')->get('info/home.md')}}
    </div>
@endsection
