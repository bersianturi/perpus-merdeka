<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-swap-horizontal"></i>
        </span>
        Peminjaman
      </h3>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <form class="form-sample">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No. Transaksi</label>
                    <div class="col-sm-9">
                      <!-- <input type="text" class="form-control" /> -->
                      <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="<?php echo $autonumber ?>" readonly="readonly">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NIS</label>
                    <div class="col-sm-9">
                      <!-- <input type="text" class="form-control" /> -->
                      <select name="nis" class="form-control form-control-sm" id="nis">
                        <option> </option>
                        <?php foreach ($anggota as $da) : ?>
                          <option value="<?php echo $da->nis ?>"><?php echo $da->nis ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-9">
                      <input type="text" id="tgl_pinjam" name="tgl_pinjam" class="form-control" value="<?php echo $tglpinjam; ?>" readonly="readonly">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Siswa</label>
                    <div class="col-sm-9">
                      <!-- <input class="form-control" placeholder="dd/mm/yyyy" /> -->
                      <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-9">
                      <input type="text" id="tgl_kembali" name="tgl_kembali" class="form-control" value="<?php echo $tglkembali; ?>" readonly="readonly">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <form class="form-sample">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kode Buku</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" class="form-control" /> -->
                      <input type="text" class="form-control" id="kode_buku">
                      <span class="text-danger text-small">* tekan enter</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Judul Buku</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="judul" readonly="readonly">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Pengarang</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="pengarang" readonly="readonly">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="button" id="cari" class="btn btn-gradient-success"><i class="mdi mdi-magnify"></i> Cari Buku</button>
                <button type="button" id="tambah_buku" class="btn btn-gradient-primary"><i class="mdi mdi-plus"></i> Tambah Buku</button>
              </div>
            </form>
            <div id="tampil"></div>
            <div class="mt-4">
              <button id="simpan" class="btn btn-gradient-primary float-end">Simpan</button>
            </div>
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

      $('#dataTables-example').DataTable({
        responsive: true
      });


      //load data tmp 
      function loadData() {
        $("#tampil").load("<?php echo site_url('peminjaman/tampil_tmp') ?>");
      }
      loadData();

      //function buat mengkosong form data buku setelah di tambah ke tmp
      function EmptyData() {
        $("#kode_buku").val("");
        $("#judul").val("");
        $("#pengarang").val("");
      }

      //ambil data anggota berdasarkan nis
      // $("#nis").click(function(){
      $("#nis").change(function() {
        var nis = $("#nis").val();

        $.ajax({
          url: "<?php echo site_url('peminjaman/cari_anggota'); ?>",
          type: "POST",
          data: "nis=" + nis,
          cache: false,
          success: function(html) {
            $("#nama").val(html);
            // document.write(html)
          }
        })

      });

      //show modal search buku
      $("#cari").click(function() {
        $("#myModal2").modal("show");
        //return false;  biar gk langsung ilang
      })

      //search buku
      $("#caribuku").keyup(function() {
        var caribuku = $('#caribuku').val();

        $.ajax({
          url: "<?php echo site_url('peminjaman/cari_buku'); ?>",
          type: "POST",
          data: "caribuku=" + caribuku,
          cache: false,
          success: function(hasil) {
            $("#tampilbuku").html(hasil);

          }
        })

      })


      //tambah buku dari modal ke form

      // $(".tambah").live("click", function(){
      $('body').on('click', '.tambah', function() {

        var kode_buku = $(this).attr("kode");
        var judul = $(this).attr("judul");
        var pengarang = $(this).attr("pengarang");

        $("#kode_buku").val(kode_buku);
        $("#judul").val(judul);
        $("#pengarang").val(pengarang);

        $("#myModal2").modal("hide");
        //console.log(kode_buku);

      });


      //event keypress cari kode
      $("#kode_buku").keypress(function() {

        //13 adalah kode asci buat enter
        if (event.which == 13) {
          var kode_buku = $("#kode_buku").val();

          $.ajax({
            url: "<?php echo site_url('peminjaman/cari_kode_buku'); ?>",
            type: "POST",
            data: "kode_buku=" + kode_buku,
            cache: false,
            success: function(hasil) {
              //split digunakan untuk memecah string    
              data = hasil.split("|");
              if (data == 0) {
                alert("Buku " + kode_buku + " Book Not Found");
                $("#judul").val("");
                $("#pengarang").val("");
              } else {
                $("#judul").val(data[0]);
                $("#pengarang").val(data[1]);
                $("#tambah_buku").focus();
              }

              //console.log(data);
            }
          })

        }

      }) //end event keypress

      //tambah_buku ke tmp
      $("#tambah_buku").click(function() {

        var kode_buku = $("#kode_buku").val();
        var judul = $("#judul").val();
        var pengarang = $("#pengarang").val();

        if (kode_buku == "") {
          alert("Kode " + kode_buku + " Masih Kosong ");
          $("#kode_buku").focus();
          return false;
        } else if (judul == "") {
          alert("Judul " + judul + " Masih Kosong ");
          return false;
        } else {
          $.ajax({
            url: "<?php echo site_url('peminjaman/save_tmp'); ?>",
            type: "POST",
            data: "kode_buku=" + kode_buku + "&judul=" + judul + "&pengarang=" + pengarang,
            cache: false,
            success: function(hasil) {
              loadData();
              EmptyData();
              //alert(hasil);
              //console.log(data);
            }
          })
        }

      }) //end tambahbuku 

      // //delete tabel tmp
      $('body').on('click', '.hapus', function() {

        //ambil dulu atribute kodenya
        var kode_buku = $(this).attr('kode');
        $.ajax({
          url: "<?php echo site_url('peminjaman/hapus_tmp'); ?>",
          type: "POST",
          data: "kode_buku=" + kode_buku,
          cache: false,
          success: function(hasil) {
            // alert(hasil);
            loadData();
          }
        })


      }); //end delete table tmp

      //simpan transaksi 
      //$("#simpan").click(function(){
      $('body').on('click', '#simpan', function() {

        //tampung data dari form buat dikirim 
        var no_transaksi = $("#no_transaksi").val();
        var tgl_pinjam = $("#tgl_pinjam").val();
        var tgl_kembali = $("#tgl_kembali").val();
        var nis = $("#nis").val();

        var jumlah_tmp = parseInt($("#jumlahTmp").val(), 10);

        //cek nis jika kosong 
        if (nis == "") {
          alert("Pilih Nis Siswa");
          $("#nis").focus();
          return false;
        } else if (jumlah_tmp == 0) {
          alert("Pilih Buku yang di pinjam");
          return false;
        } else {
          $.ajax({
            url: "<?php echo site_url('peminjaman/simpan_transaksi'); ?>",
            type: "POST",
            data: "no_transaksi=" + no_transaksi + "&tgl_pinjam=" + tgl_pinjam + "&tgl_kembali=" + tgl_kembali +
              "&nis=" + nis + "&jumlah_tmp=" + jumlah_tmp,
            cache: false,
            success: function(hasil) {
              //console.log(hasil);

              alert("Transaksi Peminjaman Berhasil");

              location.reload();
            }
          })
        }
      })
    });
  </script>
  <!-- End custom js for this page -->
  </body>

  </html>