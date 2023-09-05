<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <h3>Edit Event</h3>
    <div class="card">
        <div class="card-header">
            <?= $event['nama_event'] ?>
        </div>
        <div class="card-body">
            <form action="<?= base_url('event/' . $event['id_event']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <input type="hidden" name="_method" value="PATCH">
                <div class="row mb-3">
                    <label for="nama_event" class="col-sm-2 col-form-label">Nama Event</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_event" id="nama_event" value="<?= $event['nama_event'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_event" class="col-sm-2 col-form-label">Tanggal Event</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_event" id="tanggal_event" value="<?= $event['tanggal_event'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="<?= base_url('gambar_event/' . $event['gambar']) ?>" class="w-100" alt="">
                    </div>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $event['deskripsi'] ?></textarea>
                    </div>
                </div>
                <a href="<?= base_url('event') ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>