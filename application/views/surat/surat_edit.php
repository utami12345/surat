<!DOCTYPE html>
<html>
<head>
    <title>Edit Surat</title>
    <!-- Sertakan Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Edit Surat</h1>
        <form action="<?php echo site_url('surat/surat_edit/' . $surat['id_surat']); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $surat['id_surat']; ?>">
            <input type="hidden" name="old_file_surat" value="<?php echo $surat['file_surat']; ?>">
            
            <div class="form-group">
                <label for="nomor_surat">Nomor Surat:</label>
                <input type="text" id="nomor_surat" name="nomor_surat" class="form-control" value="<?php echo $surat['nomor_surat']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="tanggal_surat">Tanggal Surat:</label>
                <input type="date" id="tanggal_surat" name="tanggal_surat" class="form-control" value="<?php echo $surat['tanggal_surat']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="jenis_surat">Jenis Surat:</label>
                <input type="text" id="jenis_surat" name="jenis_surat" class="form-control" value="<?php echo $surat['jenis_surat']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="perihal_surat">Perihal Surat:</label>
                <input type="text" id="perihal_surat" name="perihal_surat" class="form-control" value="<?php echo $surat['perihal_surat']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="file_surat">File Surat:</label>
                <input type="file" id="file_surat" name="file_surat" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
    <!-- Sertakan Bootstrap JS dan dependensinya (jQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
