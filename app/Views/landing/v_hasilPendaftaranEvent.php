<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container shadow-sm rounded pb-2 mt-2 bg-light">
    <h3 class="text-center"><?= $title ?></h3>
    <hr>
    <div class="content text-center">
        <img src="<?= base_url('gambar_event/' . $pendaftaran['gambar']) ?>" class="img-fluid w-25">
    </div>
    <div class="p-5">
        <b class="text-info">Terimakasih : </b>
        <h3>Terimakasih <?= $pendaftaran['nama_lengkap'] ?>, sudah melakukan pendaftaran Event <?= $pendaftaran['nama_event'] ?>. Silahkan tunggu informasi selanjutnya.</h3>
        <hr>
        <a href="<?= base_url('landing') ?>" class="btn btn-info btn-sm">Kembali ke halaman utama</a>
    </div>
</div>

<?= $this->endSection() ?>