<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Data Surat</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/dist/css/adminlte.min.css">

  <style>
    .info-box {
      min-height: 110px;
      display: flex;
      align-items: center;
      background-color: #f9f9f9; 
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
      border-radius: 5px;
      border-left: 5px solid #4f4f9d; 
      transition: all 0.3s ease;
    }

    .info-box .info-box-content {
      padding: 10px;
      line-height: 1.8em;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .info-box .info-box-number {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 5px;
      color: #333;
    }

    .info-box .info-box-text {
      font-size: 16px;
      font-weight: bold;
      color: #4f4f9d; 
    }

    .info-box-icon {
      width: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      color: #ccc;
    }

    .bg-custom1 {
      border-left-color: #4f4f9d;
    }

    .bg-custom2 {
      border-left-color: #17a2b8;
    }

    .bg-custom3 {
      border-left-color: #8b8bca;
    }

    .bg-custom4 {
      border-left-color: #ffc107;
    }

    .bg-custom5 {
      border-left-color: #6c757d;
    }

    .row {
    margin-top: 20px;
    }

    .container-fluid {
    padding-top: 20px; 
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
    <div class="spinner"></div>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box bg-custom1">
              <div class="info-box-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Surat Masuk</span>
                <span class="info-box-number"><?= $jumlah_surat_masuk; ?></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box bg-custom3">
              <div class="info-box-icon">
                <i class="fas fa-paper-plane"></i>
              </div>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Surat Keluar</span>
                <span class="info-box-number"><?= $jumlah_surat_keluar; ?></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<script src="<?=base_url('assets');?>/vendor/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets');?>/vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets');?>/vendor/AdminLTE/dist/js/adminlte.min.js"></script>
<script>
  $(window).on('load', function() {
    $('.preloader').addClass('fade-out');
  });
</script>
</body>
</html>
