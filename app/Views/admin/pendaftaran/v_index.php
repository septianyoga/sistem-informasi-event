<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <h3>Halaman Pendaftaran</h3>
    <div class="row">
        <?php
        $no = 1;
        foreach ($event as $row) {
        ?>
            <div class="col-6 col-md-6 col-lg-4 mt-2">
                <div class="card text-center">
                    <div class="card-header">
                        Event ke-<?= $no++ ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_event'] ?></h5>
                        <p class="card-text">Tanggal Event <?= $row['tanggal_event'] ?></p>
                        <a href="<?= base_url('daftar/' . $row['id_event']) ?>" class="btn btn-primary">Lihat Pendaftar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="float-end mt-2">
        <?= $pagination->links('event', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>