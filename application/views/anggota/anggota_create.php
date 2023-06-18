      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-multiple"></i>
              </span>Tambah Anggota
            </h3>
          </div>
          <div class="row">
            <?php
            //validasi error upload
            if (!empty($error)) {
              echo $error;
            }
            ?>
            <?php echo form_open_multipart('anggota/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="nis">NIS</label>
                      <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS" value="<?php echo set_value('nis'); ?>">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama'); ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Jenis Kelamin</label>
                      <select name="jenis" class="form-control form-control-sm" id="exampleSelectGender">
                        <option value="">- Pilih Jenis -</option>
                        <option value="L" <?php echo set_select('jenis', 'L'); ?>>Laki Laki</option>
                        <option value="P" <?php echo set_select('jenis', 'P'); ?>>Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tanggal">Tanggal Lahir</label>
                      <input type="text" id="tanggal" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo set_value('tgl_lahir'); ?>">
                    </div>
                    <div class="form-group">
                      <label for="kelas">Kelas</label>
                      <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" value="<?php echo set_value('kelas'); ?>">
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <div class="input-group col-xs-12">
                        <input type="file" id="userfile" name="userfile" class="form-control btn-file" value="<?php echo set_value('userfile'); ?>">
                      </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div> -->
                    <div class="form-group">
                      <input type="submit" name="save" value="Simpan" class="btn btn-gradient-primary me-2">
                      <!-- <button type="submit" class="btn btn-gradient-primary me-2">Submit</button> -->
                      <?php echo anchor('anggota', 'Batal', array('class' => 'btn btn-light')); ?>
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