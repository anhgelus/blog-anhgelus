@extends('base')

@section('title', 'Admin')

@section('hero-title', 'Administration')

@section('content')
    @include('admin.part.menu')
    <section class="section">
        <h3 class="title is-4">Modifier vos paramètres</h3>
        <div class="columns">
            <form action="?update=email" method="post" class="column">
                @csrf
                <label class="label" for="email">Email</label>
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="text" value="{{ Auth::user()->email }}" name="email" id="email">
                    </div>
                    <div class="control">
                        <button class="button is-info" type="submit">
                            Modifier
                        </button>
                    </div>
                </div>
                @error('email')
                {{$message}}
                @enderror
            </form>
            <form action="?update=password" method="post" class="column">
                @csrf
                <label class="label" for="password">Mot de passe</label>
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="password" name="password" id="password">
                    </div>
                    <div class="control">
                        <button class="button is-info" type="submit">
                            Modifier
                        </button>
                    </div>
                </div>
                @error('password')
                {{$message}}
                @enderror
            </form>
        </div>
    </section>
    <hr>
    <section class="section">
        <h3 class="title is-4">Ajouter un utilisateur</h3>
        <form action="?update=new_user" method="post">
            @include('admin.part.create_user')
        </form>
    </section>
@endsection
