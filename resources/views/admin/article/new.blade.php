@extends('base')

@section('title', 'Créer un article')

@section('hero-title', 'Nouvel article')

@section('content')
    <form action="" method="post">
        @csrf
        <div class="field">
            <label class="label" for="title">Titre</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" placeholder="Titre" name="title" id="title" value="{{old('title')}}" required>
                <span class="icon is-small is-left"><i class="fas fa-newspaper"></i></span>
            </div>
            @error('title')
                <p class="help">{{$message}}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="slug">Slug</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" placeholder="Slug" name="slug" id="slug" value="{{old('slug')}}">
                <span class="icon is-small is-left"><i class="fas fa-angle-right"></i></span>
            </div>
            @error('slug')
                <p class="help">{{$message}}</p>
            @enderror
        </div>
        <div class="field">
            <label class="label" for="tag">Tag.s</label>
            <div class="control">
                <div class="select">
                    <select id="tag" name="tags[]" multiple>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            @error('tags')
            <p class="help">{{$message}}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="content">Contenu</label>
            <div class="control">
                <textarea class="textarea" placeholder="Contenu" name="content" id="content">{{old('content')}}</textarea>
            </div>
            @error('content')
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
