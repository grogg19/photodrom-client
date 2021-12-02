<header class="clearfix left-style">

    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('images/logo2.png') }}" alt="">
    </a>

    <a class="open-close-leftmenu" href="#">
        <span></span>
        <span></span>
        <span></span>
    </a>
    @auth()
    <menu-highlights-tools ref="menuHighlightsTools"></menu-highlights-tools>
    @endauth
    <div class="left-menu">
        @include('partials.nav')
        <ul class="social-icons">
            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube-square"></i></a></li>
            <li><a href="#"><i class="fab fa-vimeo-square"></i></a></li>
        </ul>
        <tags-input :tags='@json($tagsCloud)'></tags-input>
        @guest()
            <div class="text-center auth-buttons">
                <div class="btn-group" role="group" aria-label="Login | Register">
                    <a class="btn btn-outline-dark" href="{{ route('login') }}" role="button">Вход</a>
                    <a class="btn btn-outline-dark" href="{{ route('register') }}" role="button">Регистрация</a>
                </div>
            </div>
        @endguest
        @auth()
        <!-- Settings Dropdown -->
            <div class="text-center auth-buttons">
                <div class="btn-group" role="group" aria-label="Login | Register">
                    <a class="btn btn-outline-dark" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"
                       role="button">Выход</a>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth
    </div>

</header>
