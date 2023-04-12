<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    @vite(['resources/ts/app.ts'])
    <title>@yield('title') - Anhgelus Blog</title>
</head>
<body>
<header>
    @include('parts.navbar')
    <div class="hero is-link">
        <div class="hero-body">
            <h1 class="title is-2">
                @yield('hero-title', 'Anhgelus Blog')
            </h1>
            <p class="subtitle is-4 is-align-items-center is-flex">
                @yield('hero-subtitle', '')
            </p>
        </div>
    </div>
</header>
<section class="section">
    <div class="container">
        @if(session('success'))
            <div class="notification is-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('alert'))
            <div class="notification is-danger">
                {{ session('alert') }}
            </div>
        @endif
        @if(session('warning'))
            <div class="notification is-warning">
                {{ session('warning') }}
            </div>
        @endif
        @yield('content')
    </div>
</section>
</body>
</html>
