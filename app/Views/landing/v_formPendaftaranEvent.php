<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container shadow-sm rounded pb-2 mt-2 bg-light">
    <h3 class="text-center">Form <?= $title ?></h3>
    <hr>
    <div class="content text-center">
        <img src="<?= base_url('gambar_event/' . $event['gambar']) ?>" class="img-fluid w-25">
    </div>
    <div class="p-5">
        <b class="text-info">Event :</b>
        <h3><?= $event['nama_event'] ?></h3>
        <b>Tanggal : <?= $event['tanggal_event'] ?></b>
        <?php
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $key => $value) { ?>
                        <li><?= esc($value); ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php  } ?>
        <hr>
        <form action="<?= base_url('landing') ?>" enctype="multipart/form-data" method="post" class="row g-3">
            <input type="hidden" name="role" value="User">
            <div class="col-md-12">
                <label for="nama_user" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" id="nama_user">
                <input type="hidden" name="id_event" value="<?= $event['id_event'] ?>">
            </div>
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="col-md-12">
                <label for="wa" class="form-label">Nomor Whatsapp</label>
                <input type="text" name="wa" class="form-control" id="wa">
            </div>
            <div class="col-md-12">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jk">
                    <option value="">~ Pilih Jenis Kelamin~</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="password" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                <!-- <input type="text" name="password" class="form-control" id="password"> -->
            </div>
            <hr>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Daftar</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>