<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <?php
        if (!empty($message)) {
            echo $message;
        }
        ?>
        <div class="page-header">
            <div class="row">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-swap-horizontal"></i>
                    </span>Laporan Peminjaman
                </h3>
            </div>
        </div>
        <!-- <div class="row">
                        <div class="grid-margin stretch-card">
                            <a href="<?= base_url('laporan/cetak_buku') ?>" class="btn btn-gradient-info btn-rounded mx-1"><i class="mdi mdi-printer"></i> Print</a>
                            <a href="<?= base_url('laporan/cetak_buku_pdf') ?>" class="btn btn-gradient-danger btn-rounded mx-1"><i class="mdi mdi-file-pdf"></i> PDF</a>
                            <a href="<?= base_url('laporan/cetak_buku_excel') ?>" class="btn btn-gradient-success btn-rounded mx-1"><i class="mdi mdi-file-excel"></i> Excel</a>
                        </div>
                    </div> -->
        <div class="row">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tanggal Awal</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="tanggal1" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tanggal Akhir</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="tanggal2" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= base_url('laporan/cetak_peminjaman') ?>" class="btn btn-gradient-info btn-rounded mx-1"><i class="mdi mdi-printer"></i> Print</a>
                                <a href="<?= base_url('laporan/cetak_peminjaman_pdf') ?>" class="btn btn-gradient-danger btn-rounded mx-1"><i class="mdi mdi-file-pdf"></i> PDF</a>
                                <a href="<?= base_url('laporan/cetak_peminjaman_excel') ?>" class="btn btn-gradient-success btn-rounded mx-1"><i class="mdi mdi-file-excel"></i> Excel</a>
                            </div>
                            <div class="col-md-6">
                                <div class="float-end mb-4">
                                    <button id="tampilkan" class="btn btn-gradient-primary btn-rounded">Tampilkan</button>
                                </div>
                            </div>
                        </div>
                        <div id="loader"></div>
                        <div id="tampil"></div>
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
<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<!-- DataTables JavaScript -->
<!-- endinject -->
<!-- Custom js for this page -->
<script>
    $(document).ready(function() {

        //alert('');

        //load datatable
        $('#dataTables-example').DataTable({
            responsive: true
        });


        //datepicker
        $("#tanggal1").datepicker({
            format: 'yyyy-mm-dd'
        });

        $("#tanggal2").datepicker({
            format: 'yyyy-mm-dd'
        });

        $("#tanggal").datepicker({
            format: 'yyyy-mm-dd'
        });


        //get data via ajax 
        $("#tampilkan").click(function() {

            var tanggal1 = $("#tanggal1").val();
            var tanggal2 = $("#tanggal2").val();



            if (tanggal1 == "") {
                alert("Silahkan isi periode tanggal awal")
                $("#tanggal1").focus();
                return false;
            } else if (tanggal2 == "") {
                alert("Silahkan isi periode tanggal akhir")
                $("#tanggal2").focus();
                return false;
            } else {

                $('#loader').html('<img src="<?php echo base_url('assets/img/loader/loader1.gif') ?>"> ');

                $.ajax({
                    url: "<?php echo site_url('laporan/cari_pinjaman'); ?>",
                    type: "POST",
                    data: "tanggal1=" + tanggal1 + "&tanggal2=" + tanggal2,
                    cache: false,
                    success: function(hasil) {
                        // console.log(hasil);
                        $("#tampil").html(hasil);

                        $('#loader').html("").hide();
                    }
                })

                //  $('#loader').html("").hide();

            }



        }) //end #tampilkan


    }); //end document
</script>
<!-- End custom js for this page -->
</body>

</html>