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
          <i class="mdi mdi-book-multiple"></i>
        </span>Buku
      </h3>
      <?php echo anchor('buku/create', 'Tambah', array('class' => 'btn btn-md btn-gradient-info btn-rounded')); ?>
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
                    <th style="text-align: center;">Image</th>
                    <th style="text-align: center;">Kode Buku</th>
                    <th style="text-align: center;">Judul</th>
                    <th style="text-align: center;">Pengarang</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($buku->result() as $row) {
                  ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <!-- jika ada buku di dalam database maka tampilkan -->
                      <td style="text-align: center;"><?php if ($row->image != "") { ?>
                          <img src="<?php echo base_url('assets/img/buku/' . $row->image); ?>" width="100px" height="100px">
                        <?php } else { ?>
                          <img src="<?php echo base_url('assets/img/buku/book-default.jpg'); ?>" width="100px" height="100px">
                        <?php } ?>
                      </td>
                      <td style="text-align: center;"><?php echo $row->kode_buku; ?></td>
                      <td style="text-align: center;"><?php echo $row->judul; ?></td>
                      <td style="text-align: center;"><?php echo $row->pengarang; ?></td>
                      <td class="text-center">
                        <a href="<?php echo base_url('buku/edit/' . $row->kode_buku) ?>"><input type="submit" class="btn btn-gradient-success btn-xs btn-rounded" name="edit" value="Edit"></a>
                        <a href="#" name="<?php echo $row->judul; ?>" class="hapus btn btn-gradient-danger btn-xs btn-rounded" kode="<?php echo $row->kode_buku; ?>">Hapus</a>
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
        <p>Apakah anda yakin ingin menghapus buku <strong class="text-konfirmasi"> </strong> ?</p>
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
      var name = $(this).attr("name");

      $(".text-konfirmasi").text(name)
      $("#idhapus").val(kode);
      $("#myModal").modal("show");
    });

    $("#konfirmasi").click(function() {
      var kode_buku = $("#idhapus").val();

      $.ajax({
        url: "<?php echo site_url('buku/delete'); ?>",
        type: "POST",
        data: "kode_buku=" + kode_buku,
        cache: false,
        success: function(html) {
          location.href = "<?php echo site_url('buku/index/delete-success'); ?>";
        }
      });
    });
  });
</script>
<!-- End custom js for this page -->
</body>

</html>