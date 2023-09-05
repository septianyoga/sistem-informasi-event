<?= $this->extend('layout/v_template') ?>
<?= $this->section('content') ?>
<div class="container">
  <div class="row align-items-center" style="height: 700px;">
    <div class="col-12 d-flex justify-content-center">
      <div class="card">
        <h5 class="card-header bg-info text-center">Login</h5>
        <div class="card-body">
          <p class="card-text text-center">Silahkan Login dengan Username dan Password Anda.</p>
          <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
              <?= session()->getFlashdata('errors') ?>
            </div>
          <?php endif; ?>
          <?php if (session()->getFlashdata('pesan')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('pesan') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php } ?>
          <form action="<?= base_url('auth') ?>" method="post" class="row g-3">
            <div class="col-md-12">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="col-md-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="col-12 text-center mt-2">
              <button type="submit" style="float: right ;" class="btn btn-primary">Login</button>
              <br><br>
              <span style="margin: -150px;">Belum mempunyai akun? <a href="<?= base_url('registrasi') ?>" class="text-decoration-none">Daftar.</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>