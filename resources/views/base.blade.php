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
    @include('parts.header')
    <section class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>
</body>
</html>
