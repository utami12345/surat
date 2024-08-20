<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Login</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE/dist/css/adminlte.min.css">
  <style>
    body {
      background-color: #f4f6f9; 
    }
    .login-box {
      width: 360px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin: auto;
      margin-top: 10%;
      background-color: #ffffff; 
    }
    .login-box-msg {
      margin-bottom: 20px;
      text-align: center;
      color: #4f4f9d; 
    }
    .card-header h3 {
      color: #4f4f9d; 
    }
    .form-group {
      margin-bottom: 1rem;
    }
    .btn-sign-in {
      margin-top: 1rem;
      background-color: #4f4f9d; 
      border-color: #4f4f9d;
      color: #ffffff; 
    }
    .btn-sign-in:hover {
      background-color: #3a3a7d; 
      border-color: #3a3a7d;
    }
    .footer p {
      color: #6c757d; 
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline">
    <div class="card-header text-center">
      <h3><b>Form Login</b></h3>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Please sign in to continue</p>

      <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
          <?= $this->session->flashdata('error'); ?>
        </div>
      <?php endif; ?>

      <form action="<?=base_url('auth/login_process');?>" method="post">
        <div class="form-group">
          <div class="input-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-sign-in">Sign In</button>
        </div>
        <div class="footer text-center">
          <p> <b>Copyright &copy; 2024</b> All rights reserved</p>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?=base_url('assets');?>/vendor/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets');?>/vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets');?>/vendor/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
