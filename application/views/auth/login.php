<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Klinik Gemilang Medika</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/admin/assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

    <!-- Bootstrap core CSS -->
<link href="<?= base_url('assets'); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">



    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-md-4 offset-md-4 py-5">
          <form class="form-signin" action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Masuk</h1>
            
              <?= $this->session->flashdata('pesan'); ?>
              <div class="form-group">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus>
                <small class="muted text-danger"><?= form_error('username'); ?></small>
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <small class="muted text-danger"><?= form_error('password'); ?></small>
              </div>
              <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" href="<?= base_url(); ?>"type="submit">Masuk</button>
              </div>
            <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y'); ?></p>
        </form>
      </div>
    </div>
  </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url(); ?>assets/admin/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>assets/admin/assets/js/argon.js?v=1.2.0"></script>
  <div class="row mb-2">
    <div class="col-md-6">
      </div>
    </div>
  </div>
</div>
</body>
</html>
