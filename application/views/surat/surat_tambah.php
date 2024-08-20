<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Surat Keluar</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .card-header {
      background-color: #4f4f9d;
      color: white;
    }
    .card-header h5 {
      font-weight: normal !important; 
    }
    .btn-save {
      background-color: #4f4f9d; 
      border-color: #4f4f9d;
    }
    .btn-save:hover {
      background-color: #3a3a7d; 
      border-color: #3a3a7d;
    }
    .btn-back {
      background-color: #8b8bca; 
      border-color: #8b8bca;
    }
    .btn-back:hover {
      background-color: #6f6fbd;
      border-color: #6f6fbd;
    }
    .form-control {
      border-color: #4f4f9d; 
    }
    .form-control:focus {
      border-color: #3a3a7d; 
      box-shadow: 0 0 0 0.2rem rgba(58, 58, 125, 0.25); 
    }
    .form-control-file {
      border-color: #4f4f9d; 
    }
    .form-control-file:focus {
      border-color: #3a3a7d; 
    }
    .form-group label {
      color: black; 
    }
    .content-header h1 {
      color: #4f4f9d; 
      font-weight: normal !important; 
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Surat</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Data Surat -->
        <div class="card">
          <div class="card-header">
            <h5 class="m-0">Form Tambah Surat Keluar</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?php if (isset($error)): ?>
              <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <form action="<?php echo site_url('surat/store'); ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nomor_surat">Nomor Surat:</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
              </div>
              
              <div class="form-group">
                <label for="tanggal_surat">Tanggal Surat:</label>
                <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
              </div>
              
              <div class="form-group">
                <label for="jenis_surat">Jenis Surat:</label>
                <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" required>
              </div>
              
              <div class="form-group">
                <label for="perihal_surat">Perihal Surat:</label>
                <input type="text" class="form-control" id="perihal_surat" name="perihal_surat" required>
              </div>
              
              <div class="form-group">
                <label for="file_surat">File Surat:</label>
                <div class="custom-file">
                  <input type="file" id="file_surat" name="file_surat" class="custom-file-input">
                  <label class="custom-file-label" for="file_surat">Choose file</label>
                </div>
              </div>
              
              <div class="form-group text-right">
                <a href="<?php echo site_url('surat/index'); ?>" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-save">Tambah Surat Baru</button>
              </div>
            </form>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?=base_url('assets');?>/vendor/AdminLTE/dist/js/adminlte.min.js"></script>
<script>
  document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    var fileName = document.getElementById("file_surat").files[0].name;
    var nextSibling = e.target.nextElementSibling;
    nextSibling.innerText = fileName;
  });
</script>
<script>
  $(window).on('load', function() {
    $('.preloader').addClass('fade-out');
  });
</script>
</body>
</html>
