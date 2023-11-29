<nav>
    <div class="logo" style="display: flex; align-items: center;">
        <a href="{{ route('instabook.index') }}">
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
                <input class='search' type='text' name='rechercher' placeholder='Votre recherche' value=''>
                <button class='search' type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </li>
        <li>
            <select class="filtre">
                <option class="filtre">Filtre</option>
                <option class="filtre" href="#">Policier</option>
            </select>
        </li>
        <li><a href="{{ route('instabook.index') }}">Accueil</a></li>
        <li><a href="/instabook/create">Créer un livre</a></li>

        @guest
            <li><a class="login-button" href="{{ route('login') }}" :active="request()->routeIs('login')">Se connecter</a></li>
            <li><a class="login-button" href="{{ route('register') }}" :active="request()->routeIs('register')">Inscription</a></li>
        @else
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="login-button">Se déconnecter</button>
                </form>
            </li>
        @endguest
    </ul>
</nav>