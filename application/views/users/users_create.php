<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <?php
      echo validation_errors();
      //buat message nis
      if (!empty($message)) {
        echo $message;
      }
      ?>
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-account"></i>
        </span>Tambah User
      </h3>
    </div>
    <div class="row">
      <?php
      //validasi error upload
      if (!empty($error)) {
        echo $error;
      }
      ?>
      <?php echo form_open_multipart('users/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
              </div>
              <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="full_name" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('full_name'); ?>">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
              </div>
              <div class="form-group">
                <input type="submit" name="save" value="Simpan" class="btn btn-gradient-primary me-2">
                <!-- <button type="submit" class="btn btn-gradient-primary me-2">Submit</button> -->
                <?php echo anchor('users', 'Batal', array('class' => 'btn btn-light')); ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?= base_url('assets') ?>/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('assets') ?>/js/off-canvas.js"></script>
<script src="<?= base_url('assets') ?>/js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets') ?>/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?= base_url('assets') ?>/js/file-upload.js"></script>
<script src="<?= base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#tanggal1").datepicker({
      format: 'yyyy-mm-dd'
    });

    $("#tanggal2").datepicker({
      format: 'yyyy-mm-dd'
    });

    $("#tanggal").datepicker({
      format: 'yyyy-mm-dd'
    });
  })
</script>
<!-- End custom js for this page -->
</body>

</html>