<nav class="menu">
    <ul class="navigate-menu">
        <li><a class="active" href="{{ route('index') }}">Каталог фотографий</a></li>
        <li><a class="drop-link" href="#">About</a>
            <ul class="second-level">
                <li><a href="#" class="back-main-menu"><i class="fa fa-exchange"></i></a></li>
                <li><a href="about-me.html">About Me 1</a></li>
                <li><a href="about-me2.html">About Me 2</a></li>
                <li><a href="about-us.html">About Us</a></li>
            </ul>
        </li>
        @auth()
        <li><a href="{{ route('admin.settings') }}">Личный кабинет</a></li>
        @endauth
    </ul>
</nav>
