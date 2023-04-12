@extends('base')

@section('title', 'Login')

@section('hero-title', 'Connexion')

@section('content')
    <form action="" method="post">
        @csrf
        <div class="field">
            <label class="label" for="email">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" placeholder="Email" name="email" id="email" value="{{old('email')}}" required>
                <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
            </div>
            @error('email')
            {{$message}}
            @enderror
        </div>

        <div class="field">
            <label class="label" for="password">Mot de passe</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="password" placeholder="Password" name="password" id="password" required>
                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
            </div>
            @error('password')
            {{$message}}
            @enderror
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Se connecter</button>
            </div>
            <div class="control">
                <a class="button is-link is-light" href="{{url()->previous()}}">Annuler</a>
            </div>
        </div>
    </form>
@endsection
