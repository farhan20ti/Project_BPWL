<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin Berasku</title>
    <link href="<?= base_url() ?>assets/css/stylesAdmin.css" rel=" stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Admin Berasku</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= site_url('admin/logout') ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= site_url('admin/index') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="<?= site_url('admin/charts') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="<?= site_url('admin/tables') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin  <?php echo $this->session->userdata("nama"); ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= site_url('admin/index') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="<?= site_url('admin/charts') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="<?= site_url('admin/tables') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin Berasku
                    </div>
                </nav>
            </div>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Data User</h1>
                    <div class="row pb-4">
                        <div class="col-4">
                            <form action="<?php echo site_url('Admin/addUser')?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                                <div class="form-group mb-2">
                                    <label for="iduser">ID User</label>
                                    <input type="text" class="form-control" id="iduser" placeholder="Masukkan id user" name="iduser">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="namauser">Nama User</label>
                                    <input type="text" class="form-control" id="namauser" placeholder="Masukkan nama user" name="namauser">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="alamatuser">Alamat User</label>
                                    <input type="text" class="form-control" id="alamatuser" placeholder="Masukkan alamat user" name="alamatuser">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="alamatuser">Email User</label>
                                    <input type="email" class="form-control" id="emailuser" placeholder="Masukkan email user" name="emailuser">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="nohpuser">Nomor HP User</label>
                                    <input type="text" class="form-control" id="nohpuser" placeholder="Masukkan nomor hp user" name="nohpuser">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="passworduser">Password User</label>
                                    <input type="password" class="form-control" id="passworduser" placeholder="Masukkan password user" name="passworduser">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="fotoprofile">Foto Profil User</label>
                                    <input type="file" class="form-control-file" id="fotoprofile" name="fotoprofile">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="fotoktp">Foto KTP User</label>
                                    <input type="file" class="form-control-file" id="fotoktp" name="fotoktp">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Simpan Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/scriptsAdmin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/js/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/datatables-simple-demo.js"></script>
</body>