<nav class="navbar navbar-expand-lg navbar-dark bg-info px-5">
    <a class="navbar-brand" href="/capa">CAPAWEB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= $title == 'Capaweb' ? 'active' : ''; ?>">
                <a class="nav-link" href="/capa">Capa</a>
            </li>
            <li class="nav-item" <?= session()->get('level') == 0 ? 'hidden' : ''; ?>>
                <a class="nav-link <?= $title == 'Data User' ? 'active' : ''; ?>" href="/user/user">
                    User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $title == 'About' ? 'active' : ''; ?>" href="/capa/about">About</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= session()->get('id'); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <form action="/user/ubahpassword" method="post">
                        <input type="hidden" name="id" value="<?= session()->get('id'); ?>">
                        <button class="dropdown-item" type="submit" <?= $title == 'Ubah Password' ? 'disabled' : ''; ?>>Ubah Password</button>
                    </form>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/user/logout" onclick="return confirm('Anda akan keluar dari Capaweb ?')">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>