@extends('base')

@section('title', 'Éditer un article')

@section('hero-title', 'Éditer l\'article "'. substr($post->title, 0, 10).'"')

@section('content')
    @include('admin.part.menu')
    <a class="button is-link is-outlined mb-5" href="{{url()->previous()}}">Revenir à la page précédente</a>
    <form action="" method="post">
        @csrf
        <div class="field">
            <label class="label" for="title">Titre</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" placeholder="Titre" name="title" id="title" value="{{$post->title}}" required>
                <span class="icon is-small is-left"><i class="fas fa-newspaper"></i></span>
            </div>
            @error('title')
                <p class="help">{{$message}}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="slug">Slug</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" placeholder="Slug" name="slug" id="slug" value="{{$post->slug}}">
                <span class="icon is-small is-left"><i class="fas fa-angle-right"></i></span>
            </div>
            @error('slug')
                <p class="help">{{$message}}</p>
            @enderror
        </div>
        @php
        $tagsId = $post->tags->pluck('id');
        @endphp
        <div class="field">
            <label class="label" for="tag">Tag.s</label>
            <div class="control">
                <div class="select is-multiple">
                    <select id="tag" name="tags[]" multiple>
                    @foreach($tags as $tag)
                        <option @selected($tagsId->contains($tag->id)) value="{{$tag->id}}">{{$tag->name}}</option>
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
                <textarea class="textarea" placeholder="Contenu" name="content" id="content">{{$post->content}}</textarea>
            </div>
            @error('content')
                <p class="help">{{$message}}</p>
            @enderror
        </div>


        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Éditer</button>
            </div>
            <div class="control">
                <a class="button is-link is-light" href="{{url()->previous()}}">Annuler</a>
            </div>
        </div>
    </form>
@endsection
