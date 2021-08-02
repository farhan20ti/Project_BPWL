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
    <link href="<?= base_url() ?>assets/css/myStyle.css" rel=" stylesheet" />
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
                    Admin <?php echo $this->session->userdata("nama"); ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Grafik Pembelian Beras per Hari
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Grafik Jumlah Pembelian setiap Beras
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Beras
                            <a href="<?= site_url('admin/tambahBeras') ?>">
                                <button class="btn btn-success">Tambah data</button>
                            </a>
                        </div>
                        <div class="card-body table-overflow">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>ID Beras</th>
                                        <th class="text-start">Nama Beras</th>
                                        <th>Asal Beras</th>
                                        <th>Type Beras</th>
                                        <th>Harga Beras</th>
                                        <th>Stok Beras (Kg)</th>
                                        <th>Gambar Beras</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($showBeras)) { ?>
                                        <tr class="text-center">
                                            <td class="text-center pt-4 pb-4" colspan="8">Data Tidak Ditemukan</td>
                                        </tr>
                                        <?php } else {
                                        foreach ($showBeras as $key => $value) { ?>
                                            <tr class="text-center">
                                                <td width="10%"><?php echo $value['id_beras'] ?></td>
                                                <td class="text-start" width="8%"><?php echo $value['nama_beras'] ?></td>
                                                <td width="10%"><?php echo $value['asal_beras'] ?></td>
                                                <td width="10%"><?php echo $value['jenis_beras'] ?></td>
                                                <td width="12%">Rp. <?php echo $value['harga_beras'] ?></td>
                                                <td width="10%"><?php echo $value['stok_beras'] ?>Kg</td>
                                                <td width="20%">
                                                    <img src="<?php echo base_url() . "assets/uploaded/beras/" . $value['gambar_beras'] ?>" alt="beras" class="w-100">
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a href="<?= site_url('admin/editBeras') ?>/<?= $value['id_beras'] ?>">
                                                                <button class="btn btn-warning">Edit</button>
                                                            </a>        
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="<?= site_url('admin/deleteBeras') ?>/<?= $value['id_beras'] ?>">
                                                                <button class="btn btn-danger">Hapus</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data User
                            <a href="<?= site_url('admin/tambahUser') ?>">
                                <button class="btn btn-success">Tambah data</button>
                            </a>
                        </div>
                        <div class="card-body table-overflow pe-5">
                            <table class="table pe-5">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>ID User</th>
                                        <th class="text-start" width="20%">Nama User</th>
                                        <th>Alamat User</th>
                                        <th>Password User</th>
                                        <th width="20%">Foto Profil User</th>
                                        <th width="20%">Foto KTP User</th>
                                        <th width="30%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="pe-5">
                                    <?php if (empty($showUser)) { ?>
                                        <tr class="text-center">
                                            <td class="text-center pt-4 pb-4" colspan="7">Data Tidak Ditemukan</td>
                                        </tr>
                                        <?php } else {
                                        foreach ($showUser as $key => $value) { ?>
                                            <tr class="text-center">
                                                <td width="10%"><?php echo $value['id_user'] ?></td>
                                                <td class="text-start" width="10%"><?php echo $value['nama_user'] ?></td>
                                                <td width="15%"><?php echo $value['alamat_user'] ?></td>
                                                <td width="10%"><?php
                                                                $con = strlen($value['pass_user']);
                                                                for ($i = 1; $i <= $con; $i++) {
                                                                    echo "*";
                                                                }
                                                                ?></< /td>
                                                <td width="15%">
                                                    <?php if ($value['profile_user'] == null) { ?>
                                                        <img src="https://via.placeholder.com/50" alt="user">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url() . "assets/uploaded/user/" . $value['profile_user'] ?>" alt="user" class="w-50 rounded">
                                                    <?php } ?>
                                                </td>
                                                <td width="15%">
                                                    <img src="<?php echo base_url() . "assets/uploaded/user/" . $value['ktp_user'] ?>" alt="user" class="w-50 rounded" alt="ktp user">
                                                </td>
                                                <td>
                                                    <div class="row justify-content-between">
                                                        <div class="col-5">
                                                            <a href="<?= site_url('admin/editUser') ?>/<?= $value['id_user'] ?>">
                                                                <button class="btn btn-warning">Edit</button>
                                                            </a>
                                                        </div>
                                                        <div class="col-5">
                                                            <a href="<?= site_url('admin/deleteUser') ?>/<?= $value['id_user'] ?>">
                                                                <button class="btn btn-danger">Hapus</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Pembelian
                            <a href="<?= site_url('admin/tambahAppointment') ?>">
                                <button class="btn btn-success">Tambah data</button>
                            </a>
                        </div>
                        <div class="card-body table-overflow">
                            <table class="table table-beli">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th width="8%">ID Transaksi</th>
                                        <th width="8%">ID Beras</th>
                                        <th width="8%">ID User</th>
                                        <th width="8%">Tanggal Beli</th>
                                        <th width="8%">Jumlah Beli</th>
                                        <th width="8%">Total Harga</th>
                                        <th width="13%">Metode Pembayaran</th>
                                        <th width="13%">Jenis Pembayaran</th>
                                        <th width="5%">Setor 1</th>
                                        <th width="5%">Setor 2</th>
                                        <th width="5%">Setor 3</th>
                                        <th width="15%">Metode Pengantaran</th>
                                        <th width="8%">Status</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($showPembelian)) { ?>
                                        <tr class="text-center">
                                            <td class="text-center pt-4 pb-4" colspan="7">Data Tidak Ditemukan</td>
                                        </tr>
                                        <?php } else {
                                                foreach ($showPembelian as $key => $value) { ?>
                                            <tr class="text-center">
                                                <td><?php echo $value['id_transaksi'] ?></td>
                                                <td><?php echo $value['id_beras'] ?></td>
                                                <td><?php echo $value['id_user'] ?></td>
                                                <td><?php
                                                    $date = new dateTime($value['tgl_beli']);
                                                    echo $date->format('d-m-Y');
                                                    ?></td>
                                                <td><?php echo $value['jml_beli'] ?>Kg</td>
                                                <td>Rp. <?php echo $value['total_harga'] ?></td>
                                                <td><?php echo $value['metode_pembayaran'] ?></td>
                                                <td><?php echo $value['jenis_pembayaran'] ?></td>
                                                <?php if ($value['setor1'] == "sudah") { ?>
                                                    <td>
                                                        <button class="btn btn-success">Sudah</button>
                                                    </td>
                                               <?php } elseif($value['setor1'] == "belum") { ?>
                                                    <td>
                                                        <button class="btn btn-danger">Belum</button>
                                                    </td>
                                               <?php } elseif($value['setor1'] == null) { ?>
                                                    <td>
                                                        -
                                                    </td>
                                               <?php } ?>
                                               <?php if ($value['setor2'] == "sudah") { ?>
                                                    <td>
                                                        <button class="btn btn-success">Sudah</button>
                                                    </td>
                                               <?php } elseif($value['setor2'] == "belum") { ?>
                                                    <td>
                                                        <button class="btn btn-danger">Belum</button>
                                                    </td>
                                               <?php } elseif($value['setor2'] == null) { ?>
                                                    <td>
                                                        -
                                                    </td>
                                               <?php } ?>
                                               <?php if ($value['setor3'] == "sudah") { ?>
                                                    <td>
                                                        <button class="btn btn-success">Sudah</button>
                                                    </td>
                                               <?php } elseif($value['setor3'] == "belum") { ?>
                                                    <td>
                                                        <button class="btn btn-danger">Belum</button>
                                                    </td>
                                               <?php } elseif($value['setor3'] == null) { ?>
                                                    <td>
                                                        -
                                                    </td>
                                               <?php } ?>
                                                <td><?php echo $value['metode_penerimaan'] ?></td>
                                                <?php if ($value['status'] == "selesai") { ?>
                                                    <td>
                                                        <p class="text-success">Selesai</p>
                                                    </td>
                                               <?php } else { ?>
                                                    <td>
                                                        <p class="text-danger">Pending</p>
                                                    </td>
                                               <?php } ?>
                                                 <td>
                                                    <div class="row justify-content-between">
                                                        <div class="col-5">
                                                            <a href="<?= site_url('admin/editAppointment') ?>/<?= $value['id_transaksi'] ?>">
                                                            <button class="btn btn-warning">Edit</button>
                                                        </a>
                                                        </div>
                                                        <div class="col-5">
                                                            <a href="<?= site_url('admin/deleteAppointment') ?>/<?= $value['id_transaksi'] ?>">
                                                                <button class="btn btn-danger">Hapus</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Kurir
                            <a href="<?= site_url('admin/tambahKurir') ?>">
                                <button class="btn btn-success">Tambah data</button>
                            </a>
                        </div>
                        <div class="card-body table-overflow">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>ID Kurir</th>
                                        <th>Nama Kurir</th>
                                        <th>No. Handphone</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($showKurir)) { ?>
                                        <tr class="text-center">
                                            <td class="text-center pt-4 pb-4" colspan="4">Data Tidak Ditemukan</td>
                                        </tr>
                                        <?php } else {
                                        foreach ($showKurir as $key => $value) { ?>
                                            <tr class="text-center">
                                                <td><?php echo $value['id_kurir'] ?></td>
                                                <td><?php echo $value['nama_kurir'] ?></td>
                                                <td><?php echo $value['no_hp'] ?></td>
                                                <td>
                                                    <div class="row justify-content-around">
                                                        <div class="col-5">
                                                            <a href="<?= site_url('admin/editKurir') ?>/<?= $value['id_kurir'] ?>">
                                                                <button class="btn btn-warning">Edit</button>
                                                            </a>        
                                                        </div>
                                                        <div class="col-5">
                                                            <a href="<?= site_url('admin/deleteKurir') ?>/<?= $value['id_kurir'] ?>">
                                                                <button class="btn btn-danger">Hapus</button>
                                                            </a>  
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Pengiriman
                            <a href="<?= site_url('admin/tambahDikirim') ?>">
                                <button class="btn btn-success">Tambah data</button>
                            </a>
                        </div>
                        <div class="card-body table-overflow">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>ID Pengiriman</th>
                                        <th>ID Beras</th>
                                        <th>ID User</th>
                                        <th>ID Kurir</th>
                                        <th>Status</th>
                                        <th>Tanggal Beli</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($showPengiriman)) { ?>
                                        <tr class="text-center">
                                            <td class="text-center pt-4 pb-4" colspan="6">Data Tidak Ditemukan</td>
                                        </tr>
                                        <?php } else {
                                                foreach ($showPengiriman as $key => $value) { ?>
                                            <tr class="text-center">
                                                <td><?php echo $value['id_pengiriman'] ?></td>
                                                <td><?php echo $value['id_beras'] ?></td>
                                                <td><?php echo $value['id_user'] ?></td>
                                                <td><?php echo $value['id_kurir'] ?></td>
                                                <?php if ($value['status'] == "dikirim") { ?>
                                                   <td><p class="text-info">Sedang Dikirim</p></td>
                                                <?php } else {?>
                                                    <td><p class="text-success">Sudah Dikirim</p> </td>
                                                <?php } ?>
                                                <td><?php
                                                    $date = new dateTime($value['tgl_kirim']);
                                                    echo $date->format('d-m-Y');
                                                    ?></td>
                                                <td>
                                                    <a href="<?= site_url('admin/editDikirim') ?>/<?= $value['id_pengiriman'] ?>">
                                                        <button class="btn btn-warning">Edit</button>
                                                    </a>
                                                    <a href="<?= site_url('admin/deleteDikirim') ?>/<?= $value['id_pengiriman'] ?>">
                                                        <button class="btn btn-danger">Hapus</button>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php }
                                            } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Berasku 2021</div>
                    </div>
                </div>
            </footer>
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

</html>