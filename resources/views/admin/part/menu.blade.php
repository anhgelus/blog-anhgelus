@php
    $route = request()->route()->getName();
@endphp

<div class="tabs is-centered">
    <ul>
        <li @class(['is-active' => str_starts_with($route, 'admin.overview')])><a href="{{route('admin.overview')}}">Overview</a></li>
        <li @class(['is-active' => str_starts_with($route, 'admin.article')])><a href="{{route('admin.article')}}">Articles</a></li>
        <li @class(['is-active' => str_starts_with($route, 'admin.tags')])><a href="{{route('admin.tags')}}">Tags</a></li>
    </ul>
</div>
