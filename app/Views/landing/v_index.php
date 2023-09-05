<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container shadow-sm rounded pb-5 mt-2">
    <div class="alert alert-success text-center" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat datang <?= session()->get('nama') ?> di ZS Event.</p>
    </div>
    <form class="d-flex" role="search" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" name="keyword" aria-label="Search" value="<?= $keyword ?>">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <hr>
    <h5 class="text-center">Event</h5>
    <hr>
    <div class="row">
        <?php foreach ($event as $row) { ?>
            <div class="col-6 col-lg-3">
                <div class="card me-2 h-100">
                    <!-- <div class="card-header"> -->
                    <img src="<?= base_url('gambar_event/' . $row['gambar']) ?>" class="card-img-top">
                    <!-- </div> -->
                    <div class="card-body align-items-end">
                        <h5 class="card-title"><?= $row['nama_event'] ?></h5>
                        <p class="card-text"><?= substr($row['deskripsi'], 0, 50) . "...."  ?></p>
                        <a href="<?= base_url('landing/' . $row['id_event']) ?>" class="btn btn-info">Lihat</a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <div class="float-end m-2">
        <?= $pagination->links('event', 'pagination') ?>
    </div>
</div>

<?= $this->endSection() ?>