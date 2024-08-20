<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cari Data Surat Keluar</title>

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
  .card-title {
    font-size: 20px;
  }
  .btn-primary {
    background-color: #4f4f9d; 
    border-color: #4f4f9d;
  }
  .btn-primary:hover {
    background-color: #3a3a7d;
    border-color: #3a3a7d;
  }
  .btn-delete {
    background-color: #8b8bca; 
    border-color: #8b8bca;
  }
  .btn-delete:hover {
    background-color: #b1b1d5;
    border-color: #b1b1d5;
  }
  .btn-edit {
        background-color: #8b8bca;
        border-color: #8b8bca;
    }
  .btn-edit:hover {
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
  .table th, .table td {
    vertical-align: middle;
  }
  .btn-link {
    color: #4f4f9d; 
  }
  .btn-link:hover {
    color: #3a3a7d;
  }
  .btn-back {
    background-color: #8b8bca; 
    margin-top: 20px;
  }
  .btn-back:hover {
    background-color: #6f6fbd;
    border-color: #6f6fbd;
  }
  .content-header h1 {
      color: #4f4f9d; 
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
            <h1 class="m-0">Cari Data Surat</h1>
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
            <h3 class="card-title">Data Surat Keluar</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nomor Surat</th>
                  <th>Tanggal Surat</th>
                  <th>Jenis Surat</th>
                  <th>Perihal Surat</th>
                  <th>File Surat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($surat)): ?>
                  <?php foreach ($surat as $s): ?>
                    <tr>
                      <td><?php echo $s->nomor_surat; ?></td>
                      <td><?php echo $s->tanggal_surat; ?></td>
                      <td><?php echo $s->jenis_surat; ?></td>
                      <td><?php echo $s->perihal_surat; ?></td>
                      <td>
                        <a href="<?php echo base_url('uploads/'.$s->file_surat); ?>" class="btn btn-link"><i class="fas fa-download"></i></a>
                      </td>
                      <td>
                        <div class="button-container text-center">
                          <a href="<?php echo base_url('surat/surat_edit/'.$s->id_surat); ?>" class="btn btn-edit"><i class="fas fa-edit"></i></a>
                          <a href="<?php echo base_url('surat/hapus/'.$s->id_surat); ?>" class="btn btn-delete"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6" class="text-center">Data surat tidak ditemukan.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
            <div class="text-left">
              <a href="<?php echo site_url('surat/index'); ?>" class="btn btn-back">Kembali</a>
            </div>
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
