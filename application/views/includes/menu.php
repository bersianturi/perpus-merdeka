<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="<?= base_url('dashboard'); ?>"><img src="<?= base_url('assets') ?>/images/logo.png" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url('dashboard'); ?>"><img src="<?= base_url('assets') ?>/images/logo-mini.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="<?= ('login/logout') ?>">
                            Logout&nbsp;
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item <?php if ($judul == 'Dashboard') echo 'active'; ?>">
                        <a class="nav-link " href="<?= base_url('dashboard'); ?>">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">&nbsp; Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($judul == 'Anggota' or $judul == 'Tambah Anggota' or $judul == 'Edit Anggota' or $judul == 'Buku' or $judul == 'Tambah Buku' or $judul == 'Edit Buku' or $judul == 'User' or $judul == 'Tambah User' or $judul == 'Edit User')
                                            echo 'active';
                                        ?>">
                        <a class="nav-link" data-bs-toggle="collapse" href="#modul-master" aria-expanded="false" aria-controls="modul-master">
                            <i class="mdi mdi-buffer menu-icon"></i>
                            <span class="menu-title">&nbsp; Modul Master</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="<?php if ($judul == 'Anggota' or $judul == 'Tambah Anggota' or $judul == 'Edit Anggota' or $judul == 'Buku' or $judul == 'Tambah Buku' or $judul == 'Edit Buku' or $judul == 'User' or $judul == 'Tambah User' or $judul == 'Edit User') {
                                        echo 'show';
                                    } else {
                                        echo 'collapse';
                                    };
                                    ?>" id="modul-master">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item <?php if ($judul == 'Anggota' or $judul == 'Tambah Anggota' or $judul == 'Edit Anggota') echo 'active'; ?>"> <a class="nav-link" href="<?= base_url('anggota'); ?>"><i class="mdi mdi-account-multiple mdi-12px"></i> &nbsp; Anggota</a></li>
                                <li class="nav-item <?php if ($judul == 'Buku' or $judul == 'Tambah Buku' or $judul == 'Edit Buku') echo 'active' ?>"> <a class="nav-link" href="<?= base_url('buku'); ?>"><i class="mdi mdi-book-multiple mdi-12px"></i> &nbsp; Buku</a></li>
                                <li class="nav-item <?php if ($judul == 'User' or $judul == 'Tambah User' or $judul == 'Edit User') echo 'active' ?>"> <a class="nav-link" href="<?= base_url('users'); ?>"><i class="mdi mdi-account mdi-12px"></i> &nbsp; User</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?php if ($judul == 'Peminjaman' or $judul == 'Pengembalian')
                                            echo 'active';
                                        ?>">
                        <a class="nav-link" data-bs-toggle="collapse" href="#modul-transaksi" aria-expanded="false" aria-controls="modul-transaksi">
                            <i class="mdi mdi-swap-horizontal menu-icon"></i>
                            <span class="menu-title">&nbsp; Modul Transaksi</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="<?php if ($judul == 'Peminjaman' or $judul == 'Pengembalian') {
                                        echo 'show';
                                    } else {
                                        echo 'collapse';
                                    };
                                    ?>" id="modul-transaksi">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item <?php if ($judul == 'Peminjaman')
                                                        echo 'active';
                                                    ?>"> <a class="nav-link" href="<?= base_url('peminjaman'); ?>"><i class="mdi mdi-swap-horizontal mdi-12px"></i> &nbsp; Peminjaman</a></li>
                                <li class="nav-item <?php if ($judul == 'Pengembalian')
                                                        echo 'active';
                                                    ?>"> <a class="nav-link" href="<?= base_url('pengembalian'); ?>"><i class="mdi mdi-keyboard-return mdi-12px"></i>&nbsp; Pengembalian</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?php if ($judul == 'Laporan Anggota' or $judul == 'Laporan Buku' or $judul == 'Laporan Peminjaman' or $judul == 'Laporan Pengembalian')
                                            echo 'active';
                                        ?>">
                        <a class="nav-link" data-bs-toggle="collapse" href="#modul-laporan" aria-expanded="false" aria-controls="modul-laporan">
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                            <span class="menu-title">&nbsp; Modul Laporan</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="<?php if ($judul == 'Laporan Anggota' or $judul == 'Laporan Buku' or $judul == 'Laporan Peminjaman' or $judul == 'Laporan Pengembalian') {
                                        echo 'show';
                                    } else {
                                        echo 'collapse';
                                    };
                                    ?>" id="modul-laporan">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item <?php if ($judul == 'Laporan Anggota')
                                                        echo 'active';
                                                    ?>"> <a class="nav-link" href="<?= base_url('laporan/anggota'); ?>"><i class="mdi mdi-account-multiple mdi-12px"></i> &nbsp; Laporan Anggota</a></li>
                                <li class="nav-item <?php if ($judul == 'Laporan Buku')
                                                        echo 'active';
                                                    ?>"> <a class="nav-link" href="<?= base_url('laporan/buku'); ?>"><i class="mdi mdi-book-multiple mdi-12px"></i> &nbsp; Laporan Buku</a></li>
                                <li class="nav-item <?php if ($judul == 'Laporan Peminjaman')
                                                        echo 'active';
                                                    ?>"> <a class="nav-link" href="<?= base_url('laporan/peminjaman'); ?>"><i class="mdi mdi-swap-horizontal mdi-12px"></i> &nbsp; Laporan Peminjaman</a></li>
                                <li class="nav-item <?php if ($judul == 'Laporan Pengembalian')
                                                        echo 'active';
                                                    ?>"> <a class="nav-link" href="<?= base_url('laporan/pengembalian'); ?>"><i class="mdi mdi-keyboard-return mdi-12px"></i> &nbsp; Laporan Pengembalian</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>