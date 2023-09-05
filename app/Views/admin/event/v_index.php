<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container shadow-sm rounded pb-5 mt-2">
    <h3>Halaman Event</h3>
    <button class="btn btn-primary mb-3" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
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
    <?php if (session()->getFlashdata('pesan')) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <table class="table table-bordered border-dark-subtle">
        <tr class="bg-info bg-opacity-25">
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th class="text-center w-25">Opsi</th>
        </tr>
        <?php
        $page = isset($_GET['page_event']) ? $_GET['page_event'] : 1;
        $no = 1 + (6 * ($page - 1));
        foreach ($event as $row) {
        ?>
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= $row['nama_event'] ?></td>
                <td><?= $row['tanggal_event'] ?></td>
                <td class="text-center d-flex justify-content-center gap-1">
                    <a href="<?= base_url('event/' . $row['id_event']) ?>" class="btn btn-secondary btn-sm">Detail</a>
                    <form action="<?= base_url('event/' . $row['id_event']) ?>" method="post" onsubmit="return confirm('Yakin ?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    <a href="<?= base_url('event/' . $row['id_event']) ?>/edit" class="btn btn-success btn-sm">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="float-end">
        <?= $pagination->links('event', 'pagination') ?>
    </div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('event') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_event" id="nama" placeholder="Masukan Nama">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal_event" id="tanggal" placeholder="Tanggal Event">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>