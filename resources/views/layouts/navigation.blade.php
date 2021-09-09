 <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            @guest()
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-light" href="{{ route('login') }}" role="button">Вход</a>
                        <a class="btn btn-light" href="{{ route('register') }}" role="button">Регистрация</a>
                    </div>
                </div>
            @endguest
            @auth()
            <!-- Settings Dropdown -->
                <div class="dropdown">
                    <a id="navbarDropdown" class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                        {{ auth()->user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
