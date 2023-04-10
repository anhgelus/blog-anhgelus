@extends('base')

@section('title', 'Admin')

@section('content')
    @include('admin.menu')
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

            <div class="field">
                <div class="control">
                    <button class="button is-link">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection
