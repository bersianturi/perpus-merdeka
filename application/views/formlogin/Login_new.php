<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masuk | Perpustakan</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url('assets'); ?>/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?= base_url('assets'); ?>/images/logo.png">
                </div>
                <h4>Selamat Datang di Perpustakaan</h4>
                <h6 class="font-weight-light">Silahkan Masuk.</h6>
                <?php if(!empty($pesan)) {
                    echo $pesan;
                } ?>
                <form class="pt-3" action="<?php echo site_url('login');?>" method="post">
                  <?php echo $this->session->flashdata('message');?>
                  <div class="form-group">
                    <?php echo form_error('username'); ?>
                    <input type="text" name="username" class="form-control form-control-lg" id="inputEmail3" placeholder="Username" value="<?php echo set_value('username'); ?>">
                  </div>
                  <div class="form-group">
                    <?php echo form_error('password'); ?>
                    <input type="password" name="password" class="form-control form-control-lg" id="inputPassword3" placeholder="Password" value="<?php echo set_value('password'); ?>">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="proses">SIGN IN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('assets'); ?>/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets'); ?>/js/off-canvas.js"></script>
    <script src="<?= base_url('assets'); ?>/js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets'); ?>/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>