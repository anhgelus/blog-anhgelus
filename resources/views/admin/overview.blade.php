@extends('base')

@section('title', 'Admin')

@section('content')
    @include('admin.menu')
    <div class="columns">
        <form action="?modify=email" method="post" class="column">
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
        <form action="?modify=password" method="post" class="column">
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
@endsection
