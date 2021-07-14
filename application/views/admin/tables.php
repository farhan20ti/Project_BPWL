<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Tables</title>
    <link href="<?= base_url() ?>assets/css/stylesAdmin.css" rel=" stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
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
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/index') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Beras
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th>ID Beras</th>
                                            <th class="text-start">Nama Beras</th>
                                            <th>Asal Beras</th>
                                            <th>Type Beras</th>
                                            <th>Harga Beras</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>BS-001</td>
                                            <td class="text-start">Topi Koki</td>
                                            <td>Sumatra Barat</td>
                                            <td>Biasa</td>
                                            <td>Rp. 115.000</td>
                                            <td>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data User
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th>ID User</th>
                                            <th class="text-start">Nama User</th>
                                            <th>Alamat User</th>
                                            <th>Password User</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>USR-001</td>
                                            <td class="text-start">Muhammad Ridwan</td>
                                            <td>Jalan Paus</td>
                                            <td>**********</td>
                                            <td>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Appointment
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th>ID Transaksi</th>
                                            <th>ID Beras</th>
                                            <th>ID User</th>
                                            <th>Tanggal Beli</th>
                                            <th>Jumlah Beli</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>TR-001</td>
                                            <td>BS-001</td>
                                            <td>USR-001</td>
                                            <td>14 July 2021</td>
                                            <td>20Kg</td>
                                            <td>Rp. 230.000</td>
                                            <td>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Kurir
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th>ID Kurir</th>
                                            <th>Nama Kurir</th>
                                            <th>No. Handphone</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>KR-001</td>
                                            <td>Suyanto</td>
                                            <td>0821 8662 9880</td>
                                            <td>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabel Dikirim
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th>ID Beras</th>
                                            <th>ID User</th>
                                            <th>ID Kurir</th>
                                            <th>Tanggal Beli</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>BS-001</td>
                                            <td>USR-001</td>
                                            <td>KR-001</td>
                                            <td>14 July 2021</td>
                                            <td>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
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