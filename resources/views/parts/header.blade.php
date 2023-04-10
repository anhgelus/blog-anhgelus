@php
    $route = request()->route()->getName();
@endphp
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('root') }}">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a @class(["navbar-item", 'is-active' => $route === 'root']) href="{{ route('root') }}">
                Home
            </a>

            <a @class(["navbar-item", 'is-active' => str_starts_with($route, 'article')]) href="{{route('article.index')}}">
                Articles
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    More
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        About
                    </a>
                    <a class="navbar-item">
                        Jobs
                    </a>
                    <a class="navbar-item">
                        Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Report an issue
                    </a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    @guest()
                        <a class="button is-primary" href="{{ route('auth.login') }}">
                            Se connecter
                        </a>
                    @endguest
                    @auth()
                        <a class="button is-light" href="{{ route('admin.overview') }}">
                            Panel Admin
                        </a>
                        <a class="button is-primary" href="{{ route('auth.logout') }}">
                            Se déconnecter
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
