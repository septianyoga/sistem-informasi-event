<nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
        <a class="navbar-brand" href="#">ZS Event</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php if (session()->get('role') == 'Admin') { ?>
                    <a class="nav-link <?= ($title == 'Halaman Admin') ? 'active' : '' ?>" aria-current="page" href="<?= base_url('admin') ?>">Home</a>
                    <a class="nav-link <?= ($title == 'Kelola Event') ? 'active' : '' ?>" href="<?= base_url('event') ?>">Event</a>
                    <a class="nav-link <?= ($title == 'Pendaftaran') ? 'active' : '' ?>" href="<?= base_url('daftar') ?>">Pendaftaran</a>
                    <a class="nav-link <?= ($title == 'Kelola User') ? 'active' : '' ?>" href="<?= base_url('user') ?>">User</a>
                <?php } else { ?>
                    <a class="nav-link <?= ($title == 'E-Event') ? 'active' : '' ?>" aria-current="page" href="<?= base_url('landing') ?>">Home</a>
                <?php } ?>
            </div>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= session()->get('role') ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="<?= base_url('auth/' . session()->get('id_user')) ?>" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="dropdown-item">Logout</button>
                            </form>
                            <!-- <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a> -->
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- <a href="<?= base_url('Auth/logout') ?>" class="btn btn-success ms-auto">Logout</a> -->
        </div>
    </div>
</nav>