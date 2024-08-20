<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Surat Keluar</title>

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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .pagination {
        justify-content: flex-end; /* Mengatur posisi pagination ke kanan */
    }
    .btn-add {
        background-color: #8b8bca;
        border-color: #8b8bca;
        margin-left: 5px;
        height: 38px;
    }
    .btn-add:hover {
        background-color: #6f6fbd;
        border-color: #6f6fbd;
    }
    .table th, .table td {
        text-align: center;
    }
    .custom-link {
        color: #4f4f9d;
        text-decoration: none;
        display: inline;
    }
    .custom-link:hover {
        text-decoration: underline;
    }
    .card-header {
        background-color: #4f4f9d;
        color: white;
        height: 63px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-right: 20px;
    }
    .card-body {
        padding: 1.5rem;
    }

    .btn-info {
        background-color: #6f6fbd;
        border-color: #6f6fbd;
    }
    .btn-info:hover {
        background-color: #4f4f9d;
        border-color: #4f4f9d;
    }
    .btn-edit {
        background-color: #8b8bca;
        border-color: #8b8bca;
    }
    .btn-edit:hover {
        background-color: #6f6fbd;
        border-color: #6f6fbd;
    }
    .btn-hapus {
        background-color: #8b8bca;
        border-color: #8b8bca;
    }
    .btn-hapus:hover {
        background-color: #b1b1d5;
        border-color: #b1b1d5;
    }
    .form-inline .input-group {
        margin-top: 15px;
        width: 270px;
    }

    .pagination .page-item .page-link {
        margin: 0 2px;
        margin-top: 10px;
        padding: 4px 8px; 
        border: 1px solid #ddd;
        color: #4f4f9d; /* Warna teks pagination (indigo) */
        font-size: 0.875rem; /* Sesuaikan ukuran teks menjadi lebih kecil */
    }

    /* Warna dan background untuk halaman aktif */
    .pagination .page-item.active .page-link {
        background-color: #4f4f9d; /* Warna background untuk halaman aktif */
        border-color: #4f4f9d; /* Warna border untuk halaman aktif */
        color: white; /* Warna teks untuk halaman aktif */
    }

    /* Hover effect untuk pagination */
    .pagination .page-item .page-link:hover {
        background-color: #6f6fbd; /* Warna background saat di-hover */
        border-color: #6f6fbd; /* Warna border saat di-hover */
        color: white; /* Warna teks saat di-hover */
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
    <div class="content-header bg-light py-3">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- Additional content here -->
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Data Surat -->
        <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="m-0">Data Surat Keluar</h5>
          <div class="d-flex ml-auto align-items-center">
            <form action="<?php echo site_url('surat/search'); ?>" method="POST" class="form-inline mr-2">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari surat...">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-light">Cari</button>
                </span>
              </div>
            </form>
            <a href="<?php echo site_url('surat/create'); ?>" class="btn btn-add">Tambah Surat Baru</a>
          </div>
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
                        <a href="<?php echo base_url('uploads/'.$s->file_surat); ?>" class="btn btn-info btn-sm"><i class="fas fa-download"></i></a>
                      </td>
                      <td>
                        <div class="button-container">
                          <a href="<?php echo base_url('surat/surat_edit/'.$s->id_surat); ?>" class="btn btn-edit btn-sm"><i class="fas fa-edit"></i></a>
                          <a href="<?php echo base_url('surat/hapus/'.$s->id_surat); ?>" class="btn btn-hapus btn-sm"><i class="fas fa-trash"></i></a>
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
            <!-- Pagination Links -->
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <?php echo $pagination; ?>
              </ul>
            </nav>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
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
