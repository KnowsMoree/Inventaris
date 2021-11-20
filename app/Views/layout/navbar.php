<nav class="
                navbar navbar-expand navbar-light
                bg-white
                justify-content-between
                px-3
                mb-5
            ">
    <div class="nav navbar-nav">
        <h3 class="fw-light">
            <a class="nav-item nav-link active" href="/">Inventaris</a>
        </h3>
    </div>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="<?= base_url(); ?>/home">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="<?= base_url(); ?>/user">User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url(); ?>/pinjam">Pinjam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url(); ?>/register">register</a>
            </li>
        </ul>
    </div>
    <div class="d-flex">
        <img src="/img/<?= (session()->get('foto') ? session()->get('foto') : 'default.png'); ?>" alt="avatar" class="rounded-circle ava">
        <h5 class="fw-light pe-3"><?= session()->get('nama'); ?></h5>
        <button class="btn p-0 bg-logout text-logout rounded-10">
            <a class="nav-link text-danger" href="<?= base_url(); ?>/logout">Logout</a>
        </button>
    </div>
</nav>