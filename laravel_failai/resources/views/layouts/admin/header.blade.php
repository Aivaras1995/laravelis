<header>
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">
                <img src="/img/logo.png" alt="logo" class="logo">
            </a>
            <a href="/login">
                <sl-avatar
                    initials="{{$user??''}}"
                    class="right hide-on-med-and-down"
                    label="User avatar">
                </sl-avatar>
            </a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Pradžia</a></li>
                <li><a href="/admin/person">Asmenys</a></li>
                <li><a href="/admin/products">Produktai</a></li>
                <li><a href="/admin/addresses">Adresai</a></li>
                <li><a href="/admin/users">Vartotojai</a></li>
                <li><a href="/admin/orders">Užsakymai</a></li>
                <li><a href="/kontaktai">Kontaktai</a></li>
            </ul>

        </div>
    </nav>
</header>
