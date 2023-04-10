@extends('base')

@section('title', 'Login')

@section('content')
    <form action="" method="post">
        @csrf
        <div class="field">
            <label class="label" for="username">Nom d'utilisateur</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" placeholder="Username" name="username" id="username">
                <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
            </div>
        </div>

        <div class="field">
            <label class="label" for="password">Mot de passe</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" placeholder="Password" name="password" id="password">
                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Submit</button>
            </div>
            <div class="control">
                <button class="button is-link is-light">Cancel</button>
            </div>
        </div>
    </form>
@endsection
