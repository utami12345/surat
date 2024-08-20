<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Application</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/AdminLTE/dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('template/sidebar'); ?>

        <div class="content-wrapper">
            <?php $this->load->view('template/header'); ?>

            <?php $this->load->view('surat/index'); ?>
            <?php $this->load->view('surat/suratm_index'); ?>

        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php $this->load->view('template/footer'); ?>

    </div>
    <!-- ./wrapper -->
     
    <script src="<?php echo base_url('assets/vendor/AdminLTE/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/dist/js/adminlte.min.js'); ?>"></script>
    
</body>
</html>
