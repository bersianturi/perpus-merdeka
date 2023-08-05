      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body p-4">
                  <img src="<?= base_url('assets') ?>/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Anggota
                  </h4>
                  <h2><i class="mdi mdi-account-multiple mdi-36px float-right"></i> <?= $countanggota; ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body p-4">
                  <img src="<?= base_url('assets') ?>/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Buku
                  </h4>
                  <h2><i class="mdi mdi-book-multiple mdi-36px float-right"></i> <?= $countbuku; ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body p-4">
                  <img src="<?= base_url('assets') ?>/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Peminjaman
                  </h4>
                  <h2><i class="mdi mdi-swap-horizontal mdi-36px float-right"></i> <?= $dipinjam; ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body p-4">
                  <a class="text-white" href="#">
                    <img src="<?= base_url('assets') ?>/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Pengembalian <i class="mdi mdi-open-in-new mdi-12px"></i>
                    </h4>
                    <h2><i class="mdi mdi-keyboard-return mdi-36px float-right"></i></h2>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-dark card-img-holder text-white">
                <div class="card-body p-4">
                  <a class="text-white" href="#">
                    <img src="<?= base_url('assets') ?>/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Laporan <i class="mdi mdi-open-in-new mdi-12px"></i>
                    </h4>
                    <h2><i class="mdi mdi-file-document-box mdi-36px float-right"></i></h2>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body p-4">
                  <a class="text-white" href="#">
                    <img src="<?= base_url('assets') ?>/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Logout <i class="mdi mdi-open-in-new mdi-12px"></i>
                    </h4>
                    <h2><i class="mdi mdi-logout mdi-36px float-right"></i></h2>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
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
      <script src="<?= base_url('assets') ?>/vendors/chart.js/Chart.min.js"></script>
      <script src="<?= base_url('assets') ?>/js/jquery.cookie.js" type="text/javascript"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="<?= base_url('assets') ?>/js/off-canvas.js"></script>
      <script src="<?= base_url('assets') ?>/js/hoverable-collapse.js"></script>
      <script src="<?= base_url('assets') ?>/js/misc.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="<?= base_url('assets') ?>/js/dashboard.js"></script>
      <script src="<?= base_url('assets') ?>/js/todolist.js"></script>

      <!-- End custom js for this page -->
      </body>

      </html>