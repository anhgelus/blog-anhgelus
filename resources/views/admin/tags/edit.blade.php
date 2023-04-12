@extends('base')

@section('title', 'Éditer un tag')

@section('hero-title', 'Éditer le tag "'. substr($tag->title, 0, 10).'"')

@section('content')
    @include('admin.part.menu')
    <a class="button is-link is-outlined mb-5" href="{{url()->previous()}}">Revenir à la page précédente</a>
    <form action="" method="post">
        @csrf
        <div class="field">
            <label class="label" for="name">Nom</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" placeholder="Nom" name="name" id="name" value="{{$tag->name}}" required>
                <span class="icon is-small is-left"><i class="fas fa-newspaper"></i></span>
            </div>
            @error('name')
                <p class="help">{{$message}}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <textarea class="textarea" placeholder="Description" name="description" id="description" required>{{$tag->description}}</textarea>
            </div>
            @error('description')
                <p class="help">{{$message}}</p>
            @enderror
        </div>


        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Éditer</button>
            </div>
            <div class="control">
                <a class="button is-link is-light" href="{{url()->previous()}}">Annuler</a>
            </div>
        </div>
    </form>
@endsection
