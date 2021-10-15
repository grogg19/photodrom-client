<header class="clearfix left-style">

    <a class="navbar-brand" href="index.html">
        <img src="images/logo2.png" alt="">
    </a>

    <a class="open-close-leftmenu" href="#">
        <span></span>
        <span></span>
        <span></span>
    </a>

    <div class="left-menu">
        @include('partials.nav')
        <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook-square"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter-square"></i></a></li>
            <li><a class="pinterest" href="#"><i class="fa fa-pinterest-square"></i></a></li>
            <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
            <li><a class="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a></li>
        </ul>
        @guest()
            <div class="text-center auth-buttons">
                <div class="btn-group" role="group" aria-label="Login | Register">
                    <a class="btn btn-outline-dark" href="{{ route('login') }}" role="button">Вход</a>
                    <a class="btn btn-outline-dark" href="{{ route('register') }}" role="button">Регистрация</a>
                </div>
            </div>
        @endguest
    </div>

</header>
