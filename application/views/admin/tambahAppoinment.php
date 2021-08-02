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
                    <h1 class="mt-4">Tambah Data Pembelian</h1>
                    <div class="row">
                        <div class="col-4">
                            <form action="<?php echo site_url('Admin/addPembelian')  ?>" method="POST">
                                <div class="form-group mb-2">
                                    <label for="idtransaksi">ID Transaksi</label>
                                    <input type="text" class="form-control" id="idtransaksi" placeholder="Masukkan id transaksi" name="idtransaksi">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="idberas">ID Beras</label>
                                    <select class="form-select" id="idberas" name="idberas">
                                        <option selected disabled>Pilih ID Beras</option>
                                      <?php foreach ($berasId as $key => $value) { ?>
                                          <option value="<?php echo $value['id_beras'] ?>"><?php echo $value['id_beras'] ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="iduser">ID User</label>
                                    <select class="form-select" id="iduser" name="iduser">
                                         <option selected disabled>Pilih ID User</option>
                                       <?php foreach ($userId as $key => $value) { ?>
                                          <option value="<?php echo $value['id_user'] ?>"><?php echo $value['id_user'] ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="tglbeli">Tanggal Beli</label>
                                    <input type="date" class="form-control" id="tglbeli" name="tglbeli">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="jmlbeli">Jumlah beli (Kg)</label>
                                    <input type="number" class="form-control" id="jmlbeli" placeholder="Masukkan jumlah beli" name="jmlbeli">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="harga">Total Harga</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukkan ID Beras dan Jumlah beli" name="harga" readonly>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend w-50">
                                        <label class="input-group-text" for="metodepembayaran">Jenis Pembayaran</label>
                                    </div>
                                    <select class="custom-select w-50" id="jenispembayaran" name="jenispembayaran">
                                        <option selected disabled>Pilih...</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="tunai">Tunai</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="norek">No. Rekening</label>
                                    <input type="text" class="form-control" id="norek" placeholder="Masukkan no rekening" name="norek">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-50">
                                        <label class="input-group-text" for="metodepembayaran">Pembayaran</label>
                                    </div>
                                    <select class="custom-select w-50" id="metodepembayaran" name="metodepembayaran">
                                        <option selected disabled>Pilih...</option>
                                        <option value="kredit">Kredit</option>
                                        <option value="cash">Cash</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-50">
                                        <label class="input-group-text" for="setor1">Setor 1</label>
                                    </div>
                                    <select class="custom-select w-50" id="setor1" name="setor1">
                                        <option selected disabled>Pilih...</option>
                                        <option value="sudah">Sudah</option>
                                        <option value="belum">Belum</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-50">
                                        <label class="input-group-text" for="setor2">Setor 2</label>
                                    </div>
                                    <select class="custom-select w-50" id="setor2" name="setor2">
                                        <option selected disabled>Pilih...</option>
                                        <option value="sudah">Sudah</option>
                                        <option value="belum">Belum</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-50">
                                        <label class="input-group-text" for="setor3">Setor 3</label>
                                    </div>
                                    <select class="custom-select w-50" id="setor3" name="setor3">
                                        <option selected disabled>Pilih...</option>
                                        <option value="sudah">Sudah</option>
                                        <option value="belum">Belum</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-50">
                                        <label class="input-group-text" for="penerimaan">Metode Penerimaan</label>
                                    </div>
                                    <select class="custom-select w-50" id="penerimaan" name="penerimaan">
                                        <option selected disabled>Pilih...</option>
                                        <option value="antar">Antar</option>
                                        <option value="jemput">Jemput</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-50">
                                        <label class="input-group-text" for="status">Status</label>
                                    </div>
                                    <select class="custom-select w-50" id="status" name="status">
                                        <option selected>Pilih...</option>
                                        <option value="selesai">Selesai</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>
                                <input type="hidden" name="" id="hargaGet" value="0">
                                <button type="submit" class="btn btn-primary mt-2 mb-5">Simpan Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function formatNumber(num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
       $(document).ready(function () {
        let harga;
        $('#jenispembayaran').change(function(){
            if ($('#jenispembayaran').val() == "transfer") {
                $('#norek').attr("disabled", false);
            } else {
                $('#norek').attr("disabled", true);
                $('#norek').val(null);
            }
        })
        $('#metodepembayaran').change(function(){
            if ($('#metodepembayaran').val() == "kredit") {
                $('#setor1').attr("disabled", false);
                $('#setor2').attr("disabled", false);
                $('#setor3').attr("disabled", false);
            } else {
                $('#setor1').attr("disabled", true);
                $('#setor2').attr("disabled", true);
                $('#setor3').attr("disabled", true);
                $('#setor1').val(null);
                $('#setor2').val(null);
                $('#setor3').val(null);
            }
        });
          $('#idberas').change(function(){ 
                let harga = null;
                var idberas = $(this).val();
                 $.ajax({
                type: "POST",
                url: "<?php echo site_url(); ?>" + "/Admin/getHargaBeras",
                data:{idberas:idberas},
                success: function(data) {
                   $("#hargaGet").val(data);
                }
              });
            }); 
            $("#jmlbeli").keyup(function(){
            var val = $(this).val();
            $("#jmlbeli").val(val);
            var harga = $("#hargaGet").val();
            var hargaDivide = harga / 10;
            var hargaRes = hargaDivide * val;
            var hargaFormatted = formatNumber(hargaRes);
             $("#harga").val(hargaFormatted);
          });
          $   
         });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/scriptsAdmin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/js/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/datatables-simple-demo.js"></script>
</body>