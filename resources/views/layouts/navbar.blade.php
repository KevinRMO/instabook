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
        <li><a href="https://www.web-leb.com/code">Home</a></li>
        <li><a href="https://www.web-leb.com/code">Solutions</a></li>
        <li><a href="https://www.web-leb.com/code">Products</a></li>
        <li><a href="https://www.web-leb.com/code">Services</a></li>
        <li><a href="https://www.web-leb.com/code">Contact Us</a></li>
        <li><a class="login-button" href="{{route('login')}}" :active="request()->routeIs('login')">Login</a></li>
    </ul>
</nav>