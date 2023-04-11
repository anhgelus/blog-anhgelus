@extends('base')

@section('title', 'Créer un tag')

@section('hero-title', 'Nouveau tag')

@section('content')
    <form action="" method="post">
        @csrf
        <div class="field">
            <label class="label" for="name">Nom</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" placeholder="Nom" name="name" id="name" value="{{old('name')}}" required>
                <span class="icon is-small is-left"><i class="fas fa-newspaper"></i></span>
            </div>
            @error('name')
                <p class="help">{{$message}}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <textarea class="textarea" placeholder="Description" name="description" id="description" required>{{old('description')}}</textarea>
            </div>
            @error('description')
                <p class="help">{{$message}}</p>
            @enderror
        </div>


        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Envoyer</button>
            </div>
            <div class="control">
                <button class="button is-link is-light">Annuler</button>
            </div>
        </div>
    </form>
@endsection
