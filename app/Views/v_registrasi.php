<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container">
  <div class="row align-items-center justify-content-center" style="height: 700px;">
    <div class="col-6 d-flex justify-content-center">
      <div class="card">
        <h5 class="card-header bg-info text-center">Registrasi</h5>
        <div class="card-body">
          <p class="card-text text-center">Silahkan Registrasi untuk Login.</p>
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
          <form action="<?= base_url('registrasi') ?>" enctype="multipart/form-data" method="post" class="row g-3">
            <input type="hidden" name="role" value="User">
            <div class="col-md-12">
              <label for="nama_user" class="form-label">Nama</label>
              <input type="text" name="nama_user" class="form-control" id="nama_user">
            </div>
            <div class="col-md-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="col-md-12">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="col-md-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="col-md-12">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" name="foto" class="form-control" id="foto">
            </div>
            <div class="col-12 text-center mt-2">
              <button type="submit" style="float: right ;" class="btn btn-primary">Registrasi</button>
              <br><br>
              <span style="margin: -150px;">Sudah mempunyai akun? <a href="<?= base_url('auth') ?>" class="text-decoration-none">Login.</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>