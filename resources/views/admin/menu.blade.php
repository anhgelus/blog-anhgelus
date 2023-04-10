@php
    $route = request()->route()->getName();
@endphp

<div class="tabs is-centered">
    <ul>
        <li @class(['is-active' => $route === 'admin.overview'])><a href="{{route('admin.overview')}}">Overview</a></li>
        <li @class(['is-active' => $route === 'admin.articles'])><a href="{{route('admin.articles')}}">Articles</a></li>
        <li @class(['is-active' => $route === 'admin.tags'])><a href="{{route('admin.tags')}}">Tags</a></li>
    </ul>
</div>
