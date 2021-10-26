<header class="clearfix left-style">

    <a class="navbar-brand" href="index.html">
        <img src="images/logo2.png" alt="">
    </a>

    <a class="open-close-leftmenu" href="#">
        <span></span>
        <span></span>
        <span></span>
    </a>

    <div class="left-menu sidebar">
        @include('partials.nav')
        <ul class="social-icons">
            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube-square"></i></a></li>
            <li><a href="#"><i class="fab fa-vimeo-square"></i></a></li>
        </ul>
        <div class="tags-widget widget">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="tags" id="tags" placeholder="Найти фотографии по тегам..." aria-label="Найти фотографии по тегам..." aria-describedby="tags-go">
                <button class="btn btn-outline-secondary" type="button" id="tags-go"><i class="fas fa-search"></i></button>
            </div>
            <ul class="tags-list">
                <li><a href="#">interior</a></li>
                <li><a href="#">design</a></li>
                <li><a href="#">web</a></li>
                <li><a href="#">house</a></li>
                <li><a href="#">nature</a></li>
                <li><a href="#">architecture</a></li>
                <li><a href="#">food</a></li>
                <li><a href="#">photography</a></li>
                <li><a href="#">lifestyle</a></li>
                <li><a href="#">photoshop</a></li>
            </ul>
        </div>
        <form id="tags-form" action="{{ route('tags.searchByTags') }}" method="POST" class="d-none">
            @csrf
        </form>
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
