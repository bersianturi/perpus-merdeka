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
          <i class="mdi mdi-book-multiple"></i>
        </span>Tambah Buku
      </h3>
    </div>
    <div class="row">
      <?php
      //validasi error upload
      if (!empty($error)) {
        echo $error;
      }
      ?>
      <?php echo form_open_multipart('buku/update', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form>
              <div class="form-group">
                <label for="kode_buku">Kode Buku</label>
                <input type="text" id="kode_buku" name="kode_buku" class="form-control" placeholder="Kode Buku" value="<?php echo $edit['kode_buku']; ?>">
              </div>
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul Buku" value="<?php echo $edit['judul']; ?>">
              </div>
              <div class="form-group">
                <label for="Pengarang">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" value="<?php echo $edit['pengarang']; ?>">
              </div>
              <div class="form-g roup">
                <label for="klasifikasi">Klasifikasi</label>
                <textarea name="klasifikasi" class="form-control" rows="4"><?php echo $edit['klasifikasi']; ?></textarea>
              </div>
              <div class="form-group">
                <label>Images</label>
                <div>
                  <?php if ($edit['image'] != '') { ?>
                    <img src="<?php echo base_url('assets/img/buku/' . $edit['image']); ?>" width="100px" height="100px">
                  <?php } else { ?>
                    <img src="<?php echo base_url('assets/img/buku/book-default.jpg'); ?>" width="100px" height="100px">
                  <?php } ?> <br /><br />
                </div>
                <div class="input-group col-xs-12">
                  <input type="file" id="userfile" name="userfile" class="form-control btn-file" value="<?php echo set_value('userfile'); ?>">
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="update" value="Simpan" class="btn btn-gradient-primary me-2">
                <!-- <button type="submit" class="btn btn-gradient-primary me-2">Submit</button> -->
                <?php echo anchor('buku', 'Batal', array('class' => 'btn btn-light')); ?>
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