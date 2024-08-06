<!DOCTYPE html>
<html>
<head>
    <title>Data Surat</title>
    <!-- Sertakan Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Sertakan Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 20px auto;
        }
        .button-container {
            margin: 10px 0 20px 0;
        }
        .btn-add {
            font-size: 0.88rem; /* Size for 'Tambah Surat Baru' */
            padding: 8px 15px; /* Padding for 'Tambah Surat Baru' */
            background-color: #007bff; /* Primary button color */
            color: #fff; /* Text color for 'Tambah Surat Baru' */
        }
        .btn-edit {
            font-size: 0.75rem;
            background-color: #ffc107; /* Edit button color */
            color: #fff; /* Text color for 'Edit' */
        }
        .btn-delete {
            font-size: 0.75rem;
            background-color: #dc3545; /* Delete button color */
            color: #fff; /* Text color for 'Hapus' */
        }
        /* Styling for table headers */
        thead th {
            background-color: #007bff; /* Header background color */
            color: #ffffff; /* Header text color */
            font-weight: bold;
            text-align: center; /* Center-align text in headers */
        }
        /* Center-align text in table cells */
        tbody td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Data Surat</h1>
        <div class="button-container text-right">
            <a href="surat/create" class="btn btn-primary btn-add">Tambah Surat Baru</a>
        </div>
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
                                <a href="<?php echo base_url('surat/surat_edit/'.$s->id_surat); ?>" class="btn btn-warning btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url('surat/hapus/'.$s->id_surat); ?>" class="btn btn-danger btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?');">
                                    <i class="fas fa-trash"></i>
                                </a>
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
    </div> //

    <!-- Sertakan Bootstrap JS dan dependensinya (jQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

