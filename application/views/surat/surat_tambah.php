<!DOCTYPE html>
<html>
<head>
    <title>Tambah Surat Baru</title>
    <!-- Sertakan Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Tambah Surat Baru</h1>
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
                <input type="file" class="form-control-file" id="file_surat" name="file_surat" required>
            </div>
            
            <div class="text-center">
                <input type="submit" value="Tambah Surat Baru" class="btn btn-custom">
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
