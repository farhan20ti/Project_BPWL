<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('partials/header.php') ?>
</head>

<body>
    <!-- AppBar-->
    <?php $this->load->view('partials/appBar.php') ?>
    <!-- End of AppBar-->

    <!-- Body Content-->
    <?php $this->load->view('pages/beranda.php') ?>
    <!-- End of Body Content-->

    <!-- Bottom Navigation -->
    <?php $this->load->view('partials/nav.php') ?>
    <!-- End of Bottom Navigation -->

    <!-- Footer -->
    <?php $this->load->view('partials/footer.php') ?>
    <!-- End of Footer -->
</body>

</html>