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
                        <i class="mdi mdi-account-multiple"></i>
                    </span>Laporan Anggota
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="grid-margin stretch-card">
                <a href="<?= base_url('laporan/cetak_anggota') ?>" class="btn btn-gradient-info btn-rounded mx-1"><i class="mdi mdi-printer"></i> Print</a>
                <a href="<?= base_url('laporan/cetak_anggota_pdf') ?>" class="btn btn-gradient-danger btn-rounded mx-1"><i class="mdi mdi-file-pdf"></i> PDF</a>
                <a href="<?= base_url('laporan/cetak_anggota_excel') ?>" class="btn btn-gradient-success btn-rounded mx-1"><i class="mdi mdi-file-excel"></i> Excel</a>
            </div>
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
                                        <th style="text-align: center;">NIS</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Tanggal Lahir</th>
                                        <th style="text-align: center;">Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($anggota->result() as $row) {
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $no; ?></td>
                                            <td style="text-align: center;"><?php echo $row->nis; ?></td>
                                            <td style="text-align: center;"><?php echo $row->nama; ?></td>
                                            <td style="text-align: center;"><?php echo $row->ttl; ?></td>
                                            <td style="text-align: center;"><?php echo $row->kelas; ?></td>
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
<!-- End custom js for this page -->
</body>

</html>