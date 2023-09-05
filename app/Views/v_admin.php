<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container mt-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hallo Admin!</strong> Selamat datang kembali.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card text-center">
                <div class="card-header">
                    Jumlah Event
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?= $jumlahEvent ?>.</p>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-center">
                <div class="card-header">
                    Jumlah Pendaftar
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?= $jumlahPendaftaran ?>.</p>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-center">
                <div class="card-header">
                    Jumlah User
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?= $jumlahUser ?>.</p>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>