@extends('base')

@section('title','À propos')

@section('hero-title', 'Qui sommes-nous ?')
@section('hero-subtitle', 'Un nerd cherchant à devenir prof-chercheur en maths.')

@section('content')
    <div class="md-parse">
        {{Storage::disk('public')->get('info/about.md')}}
    </div>
@endsection
