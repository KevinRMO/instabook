<nav>
    <div class="logo" style="display: flex;align-items: center;">
        <span
            style="color:#01939c; font-size:26px; font-weight:bold; letter-spacing: 1px;margin-left: 20px;">BOCAL</span>
    </div>
    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="nav-links">
        <li>
            <select class="filtre">
                <option class="filtre">Filtre</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Livre 1</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Livre 2</option>
                <option class="filtre" a href="https://www.web-leb.com/code">Livre 3</option>
            </select>
        </li>
        <li><a href="https://www.web-leb.com/code">Accueil</a></li>
        <li><a href="https://www.web-leb.com/code">Créer un livre</a></li>
        <li><a href="https://www.web-leb.com/code">Products</a></li>
        <li><a class="login-button" href="{{route('login')}}" :active="request()->routeIs('login')">Login</a></li>
    </ul>
</nav>