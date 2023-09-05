<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container shadow-sm rounded pb-2 mt-2 bg-light">
    <h3 class="text-center"><?= $title ?></h3>
    <hr>
    <div class="content text-center">
        <img src="<?= base_url('gambar_event/' . $event['gambar']) ?>" class="img-fluid w-25">
    </div>
    <div class="p-5">
        <b class="text-info">Event :</b>
        <h3><?= $event['nama_event'] ?></h3>
        <hr>
        <p><?= $event['deskripsi'] ?></p>
        <b>Tanggal : <?= $event['tanggal_event'] ?></b>
        <hr>
        <div class="text-center">
            <a href="<?= base_url('landing/' . $event['id_event']) ?>/edit" class="btn btn-info btn-lg  text-center">Daftar Sekarang</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>