<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <?php
    if (!empty($message)) {
      echo $message;
    }
    ?>
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-account"></i>
        </span>User
      </h3>
      <?php echo anchor('users/create', 'Tambah', array('class' => 'btn btn-md btn-gradient-info btn-rounded')); ?>
      <!-- <button class="btn btn-md btn-info btn-rounded">Tambah</button> -->
    </div>
    <div class="row">
      <div class="grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <!-- <h4 class="card-title">Data Anggota</h4> -->
            <!-- <button class="btn btn-md btn-primary btn-rounded">Tambah</button> -->
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="dataTables-example">
                <thead>
                  <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Username</th>
                    <th style="text-align: center;">Nama Lengkap</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($users as $row) {
                  ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <!-- jika ada buku di dalam database maka tampilkan -->
                      <td style="text-align: center;"><?php echo $row->username; ?></td>
                      <td style="text-align: center;"><?php echo $row->full_name; ?></td>
                      <td class="text-center">
                        <a href="<?php echo base_url('users/edit/' . $row->id_petugas) ?>"><input type="submit" class="btn btn-gradient-success btn-xs btn-rounded" name="edit" value="Edit"></a>
                        <a href="#" username="<?php echo $row->username; ?>" class="hapus btn btn-gradient-danger btn-xs btn-rounded" kode="<?php echo $row->id_petugas; ?>">Hapus</a>
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>
                </tbody>
              </table>
            </div>
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
<!-- Modal Hapus-->
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idhapus" id="idhapus">
        <p>Apakah anda yakin ingin menghapus User <strong class="text-konfirmasi"> </strong> ?</p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-danger" id="konfirmasi">Hapus</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
  // function confirmDelete()
  // {
  //     return confirm("Apakah anda yakin ingin menghapus data anggota")
  // }

  $(function() {
    $(".hapus").click(function() {
      var kode = $(this).attr("kode");
      var name = $(this).attr("username");

      $(".text-konfirmasi").text(name)
      $("#idhapus").val(kode);
      $("#myModal").modal("show");
    });

    $("#konfirmasi").click(function() {
      var id_petugas = $("#idhapus").val();

      $.ajax({
        url: "<?php echo site_url('users/delete'); ?>",
        type: "POST",
        data: "id_petugas=" + id_petugas,
        cache: false,
        success: function(html) {
          location.href = "<?php echo site_url('users/index/delete-success'); ?>";
        }
      });
    });
  });
</script>
<!-- End custom js for this page -->
</body>

</html>