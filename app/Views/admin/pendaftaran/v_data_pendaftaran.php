<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <h3>Data Pendaftaran</h3>
    <div class="card">
        <div class="card-header">
            Data Pendaftaran <?= $event['nama_event'] ?>
            <a href="<?= base_url('daftar') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <table class="table table-bordered">
                <tr class="bg-info bg-opacity-25">
                    <th>No</th>
                    <th>Nama Pendaftar</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No WA</th>
                    <th>Tanggal Daftar</th>
                    <th class="text-center">Opsi</th>
                </tr>
                <?php
                $no = 1;
                foreach ($pendaftaran as $row) {
                ?>
                    <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $row['nama_lengkap'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['wa'] ?></td>
                        <td><?= $row['tanggal_daftar'] ?></td>
                        <td class="text-center">
                            <form action="<?= base_url('daftar/' . $row['id_pendaftaran']) ?>" method="post" onsubmit="return confirm('Yakin ?')">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="float-end ms-3">
            <?= $pagination->links('event', 'pagination') ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>