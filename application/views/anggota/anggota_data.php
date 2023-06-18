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
          <i class="mdi mdi-account-multiple"></i>
        </span>Anggota
      </h3>
      <?php echo anchor('anggota/create', 'Tambah', array('class' => 'btn btn-md btn-gradient-info btn-rounded')); ?>
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
                    <th style="text-align: center;">NIS</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Tanggal Lahir</th>
                    <th style="text-align: center;">Kelas</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($anggota->result() as $row) {
                  ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <td style="text-align: center;"><?php if ($row->image != "") { ?>
                          <img src="<?php echo base_url('assets/img/anggota/' . $row->image); ?>" width="100px" height="100px">
                        <?php } else { ?>
                          <img src="<?php echo base_url('assets/img/anggota/images.jpg'); ?>" width="100px" height="100px">
                        <?php } ?>
                      </td>
                      <td style="text-align: center;"><?php echo $row->nis; ?></td>
                      <td style="text-align: center;"><?php echo $row->nama; ?></td>
                      <td style="text-align: center;"><?php echo $row->ttl; ?></td>
                      <td style="text-align: center;"><?php echo $row->kelas; ?></td>
                      <td class="text-center">
                        <a href="<?php echo base_url('anggota/edit/' . $row->nis) ?>"><input type="submit" class="btn btn-gradient-success btn-xs btn-rounded " name="edit" value="Edit"></a>
                        <a href="#" name="<?php echo $row->nama; ?>" class="hapus btn btn-gradient-danger btn-xs btn-rounded" kode="<?php echo $row->nis; ?>">Hapus</a>
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
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
      </div>
      <div class="modal-body">
        <input type="hidden" name="idhapus" id="idhapus">
        <p>Apakah anda yakin ingin menghapus <strong class="text-konfirmasi"> </strong> ?</p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-danger" id="konfirmasi">Hapus</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('assets') ?>/js/off-canvas.js"></script>
<script src="<?= base_url('assets') ?>/js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets') ?>/js/misc.js"></script>
<!-- DataTables JavaScript -->
<!-- endinject -->
<!-- Custom js for this page -->
<script type="text/javascript">
  // function confirmDelete()
  // {
  //     return confirm("Apakah anda yakin ingin menghapus data anggota")
  // }

  $(function() {
    $(".hapus").click(function() {
      var kode = $(this).attr("kode");
      var name = $(this).attr("name");

      $(".text-konfirmasi").html(name)
      $("#idhapus").val(kode);
      $("#myModal").modal("show");
    });

    $("#konfirmasi").click(function() {
      var kode = $("#idhapus").val();

      $.ajax({
        url: "<?php echo site_url('anggota/delete'); ?>",
        type: "POST",
        data: "kode=" + kode,
        cache: false,
        success: function(html) {
          location.href = "<?php echo site_url('anggota/index/delete-success'); ?>";
        }
      });
    });
  });
</script>
<!-- End custom js for this page -->
</body>

</html>