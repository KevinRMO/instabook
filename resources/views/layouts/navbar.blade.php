<nav>
    <div class="logo" style="display: flex; align-items: center;">
        <a href="/">
            <img src="https://i.ibb.co/x7jy2Sw/instabook-logo.png" alt="instabook-logo">
        </a>
    </div>
    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="nav-links">
        <li>
            <form  action='{{ route('rechercher') }}' method='get'>
                <input class='search' type='text' name='rechercher' placeholder='Rechercher' value=''>
                <button class='search-btn' type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </li>
        
        <li><a href="/">Accueil</a></li>
        <li><a href="/instabook/create">Créer un livre</a></li>

        @guest
            <li><a class="login-button" href="{{ route('login') }}" :active="request()->routeIs('login')">Se connecter</a></li>
            <li><a class="login-button" href="{{ route('register') }}" :active="request()->routeIs('register')">Inscription</a></li>
        @else
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">Se déconnecter</button>
                </form>
            </li>
        @endguest
    </ul>
</nav>