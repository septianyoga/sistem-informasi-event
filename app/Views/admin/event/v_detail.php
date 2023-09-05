<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <h3>Detail Event</h3>
    <div class="card">
        <div class="card-header">
            <?= $event['nama_event'] ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img src="<?= base_url('gambar_event/' . $event['gambar']) ?>" class="img-fluid w-100">
                </div>
                <div class="col-8">
                    <p class="card-text"><b>Tanggal Event : </b> <?= $event['tanggal_event'] ?></p>
                    <p class="card-text"><b>Deskripsi Event : </b> </p>
                    <p class="card-text"><?= $event['deskripsi'] ?></p>
                    <a href="<?= base_url('event') ?>" class="btn btn-secondary">Kembali</a>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>