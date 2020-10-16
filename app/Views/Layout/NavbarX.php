<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-end">
    <a class="navbar-brand" href="#">CAPAWEB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item <?= $title == 'Capaweb' ? 'active' : ''; ?>">
                <a class="nav-link" href="/capa">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $title == 'About' ? 'active' : ''; ?>" href="/capa/about">About</a>
            </li>
            <li class="nav-item" <?= session()->get('level') == 0 ? 'hidden' : ''; ?>>
                <a class="nav-link <?= $title == 'About' ? 'active' : ''; ?>" href="/user/user">
                    User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/logout" onclick="return confirm('Anda akan keluar dari Capaweb ?')">Log Out</a>
            </li>
        </ul>
        <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">

            </li>
        </ul>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">

            </li>
        </ul>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">

            </li>
        </ul>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">

            </li>
        </ul> -->
        <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0 justify-content-end">

        </ul> -->
    </div>
</nav>