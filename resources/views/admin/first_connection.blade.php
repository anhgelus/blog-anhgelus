@extends('base')

@section('title', 'Admin')

@section('content')
    <h3 class="title is-4">Ajouter un utilisateur</h3>
    <form action="" method="post">
        @include('admin.part.create_user')
    </form>
@endsection
