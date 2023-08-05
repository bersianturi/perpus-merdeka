      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-keyboard-return"></i>
              </span>
              Pengembalian
            </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form class="form">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label">No. Transaksi</label>
                          <div class="col-md-9">
                            <!-- <input type="text" class="form-control" /> -->
                            <input type="text" id="no_transaksi" name="no_transaksi" class="form-control">
                            <span class="text-danger text-small">* tekan enter</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NIS</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" class="form-control" /> -->
                            <input type="text" name="nis" id="nis" class="form-control" readonly="readonly">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                          <div class="col-sm-9">
                            <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="readonly">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Siswa</label>
                          <div class="col-sm-9">
                            <input type="text" name="nama" id="nama" class="form-control" readonly="readonly">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Kembali</label>
                          <div class="col-sm-9">
                            <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="readonly">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Denda</label>
                          <div class="col-sm-9">
                            <select name="denda" id="denda" class="form-control form-control-sm">
                              <option></option>
                              <option value="Y">Y</option>
                              <option value="N">N</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nominal</label>
                          <div class="col-sm-9">
                            <input type="text" name="nominal" id="nominal" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div id="tampilbuku"></div>
                  <button id="simpan_transaksi" class="btn btn-gradient-primary float-end">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
      </div>
      </div>
      <!-- page-body-wrapper ends -->
      </div>
      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
              <h4 class="modal-title">Cari Buku</h4>
            </div>
            <div class="modal-body"><br />
              <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
              <input type="text" name="caribuku" id="caribuku" class="form-control" placeholder="Cari Buku">

              <div id="tampilbuku"></div>

            </div>

            <br /><br />
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
              <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
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
        <script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>
        <!-- <script src="../../assets/js/file-upload.js"></script> -->
        <script>
          $(document).ready(function() {

            //alert('');

            //load datatable
            $('#dataTables-example').DataTable({
              responsive: true
            });

            //show modal nis
            $("#cari_nis").click(function() {
              $("#myModal3").modal("show");
            });

            //cari by nis
            $("#carinis").keyup(function() {
              var nis = $("#carinis").val();

              $.ajax({
                url: "<?php echo site_url('pengembalian/cari_nis'); ?>",
                type: "POST",
                data: "nis=" + nis,
                cache: false,
                success: function(hasil) {
                  // console.log(hasil);
                  $("#tampilnis").html(hasil);
                }
              })
            })


            //tambahkan data dari modal ke form berdasarkan id_transaksi
            $('body').on('click', '.tambahkan', function() {

              var id_transaksi = $(this).attr("no_transaksi");
              // console.log(id_transaksi);
              $("#no_transaksi").val(id_transaksi);
              $("#myModal3").modal("hide");
              $("#no_transaksi").focus();

            });




            //keypress no_transaksi
            $("#no_transaksi").keypress(function() {

              if (event.which == 13) {

                var no_transaksi = $("#no_transaksi").val();

                $.ajax({
                  url: "<?php echo site_url('pengembalian/cari_transaksi'); ?>",
                  type: "POST",
                  data: "no_transaksi=" + no_transaksi,
                  cache: false,
                  success: function(hasil) {
                    //split digunakan untuk memecah string    

                    if (hasil == "") {
                      alert("Data tidak ditemukan");
                    } else {
                      //    console.log(hasil);
                      data = hasil.split("|");
                      $("#nis").val(data[0]);
                      $("#tgl_pinjam").val(data[1]);
                      $("#tgl_kembali").val(data[2]);
                      $("#nama").val(data[3]);

                      $("#denda").attr("disabled", false);
                      $("#denda").focus();

                      $("#tampilbuku").load("<?php echo site_url('pengembalian/tampil_buku') ?>",
                        "no_transaksi=" + no_transaksi);
                    }

                    //console.log(data);
                  }
                }) //end ajax

              } //end event

            }) //end keypress

            //buat disable denda dan nominal sebagai nilai default
            $("#nominal").attr("disabled", true);
            $("#denda").attr("disabled", true);

            //disable enabled combobox
            $("#denda").click(function() {
              var denda = $("#denda").val();
              if (denda == "Y") {
                $("#nominal").attr("disabled", false);

              } else {
                $("#nominal").attr("disabled", true);

              }

            });

            $("#simpan_transaksi").click(function() {

              var no_transaksi = $("#no_transaksi").val();
              var nis = $("#nis").val();
              var denda = $("#denda").val();
              var nominal = parseInt($("#nominal").val());
              var nominal2 = $("#nominal").val();

              if (no_transaksi == "" || nis == "") {
                alert("Pilih ID Transaksi");
                $("#no_transaksi").focus();
                return false;
              } else if (denda == "") {
                alert("Pilih Denda");
                $("#denda").focus();
                return false;
              } else if (denda == "Y") {

                if (nominal2 == "") {
                  alert("Masukan nominal denda");
                  $("#nominal").focus();
                  return false;
                }
                //kalau sudah lengkap lakukan insert ke database 
                else {
                  $.ajax({
                    url: "<?php echo site_url('pengembalian/simpan_transaksi'); ?>",
                    type: "POST",
                    data: "no_transaksi=" + no_transaksi + "&denda=" + denda + "&nominal=" + nominal,
                    cache: false,
                    success: function() {
                      alert("Transaksi berhasil disimpan");
                      location.reload();
                    }
                  }) //end ajax
                }
              } else {
                $.ajax({
                  url: "<?php echo site_url('pengembalian/simpan_transaksi'); ?>",
                  type: "POST",
                  data: "no_transaksi=" + no_transaksi + "&denda=" + denda + "&nominal=" + nominal,
                  cache: false,
                  success: function() {
                    alert("Transaksi berhasil disimpan");
                    location.reload();
                  }
                }) //end ajax
              }
            }) //end simpan_transaksai
          });
        </script>
        <!-- End custom js for this page -->
        </body>

        </html>