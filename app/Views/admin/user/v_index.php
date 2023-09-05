<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container shadow-sm rounded pb-5 mt-2 overflow-scroll">
    <h3>Halaman <?= $title ?></h3>
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
            <th style="width: 15%;">Nama</th>
            <th style="width: 20%;">Email</th>
            <th>Username</th>
            <th>Role</th>
            <th class="text-center" style="width: 15%;">Foto</th>
            <th class="text-center" style="width: 15%;">Opsi</th>
        </tr>
        <?php
        $page = isset($_GET['page_user']) ? $_GET['page_user'] : 1;
        $no = 1 + (5 * ($page - 1));
        foreach ($user as $row) {
        ?>
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= $row['nama_user'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['role'] ?></td>
                <td class="text-center"><img src="<?= base_url('foto/' . $row['foto']) ?>" alt="foto" class="w-50"></td>
                <td class="text-center d-flex gap-1 justify-content-center">
                    <form action="<?= base_url('user/' . $row['id_user']) ?>" method="post" onsubmit="return confirm('Yakin ?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-<?= $row['id_user'] ?>">Edit</button>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="float-end">
        <?= $pagination->links('user', 'pagination') ?>
    </div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" name="nama_user" id="nama" placeholder="Masukan Nama" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control" id="role">
                            <option value="">~ Pilih ~</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukan FOto" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- modal Edit -->
<?php foreach ($user as $data) { ?>
    <div class="modal fade" id="edit-<?= $data['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengguna</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/' . $data['id_user']) ?>/edit" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" name="nama_user" id="nama" placeholder="Masukan Nama" required value="<?= $data['nama_user'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required value="<?= $data['email'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required value="<?= $data['username'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password" required value="<?= $data['password'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-control" id="role">
                                <option value="">~ Pilih ~</option>
                                <option value="Admin" <?= ($data['role'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                                <option value="User" <?= ($data['role'] == 'User') ? 'selected' : '' ?>>User</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukan FOto">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <img src="<?= base_url('foto/' . $data['foto']) ?>" class="w-25" alt="">
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?= $this->endSection() ?>