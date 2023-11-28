<nav>
    <div class="logo" style="display: flex;align-items: center;">
            <a href="instabook.index"><img src="https://i.ibb.co/x7jy2Sw/instabook-logo.png" alt="instabook-logo"></a>
    </div>
    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="nav-links">

        <li>
            <form  action='' method='post'>
                <input class='search' type='text' name='rechercher' placeholder='Vôtre recherche' value=''>
                <input class='search' type='submit' value='Rechercher'>
            </form>
        <li>
            <select class="filtre">
                <option class="filtre">Filtre</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Policier</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Manga</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Horreur</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Fantaisie</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Fantastique</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Biographie</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Poésie</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Conte</option>
            </select>
        </li>
        <li><a href="https://www.web-leb.com/code">Accueil</a></li>
        <li><a href="https://www.web-leb.com/code">Créer un livre</a></li>
        <li><a class="login-button" href="{{route('login')}}" :active="request()->routeIs('login')">Se connecter</a></li>
        <li><a class="login-button" href="{{route('register')}}" :active="request()->routeIs('register')">Inscription</a></li>
    </ul>
</nav>