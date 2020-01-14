
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$pageTitle?> | Sistem Inventaris</title>
    <link rel="stylesheet" href="<?=base_url('assets/front/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/styles/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body>
    <nav class="navbar navbar-light fixed-top" style="background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,0.64) 33%,rgba(255,255,255,0) 100%);">
      <a class="navbar-brand" href="#">Sistem Inventaris</a>
    </nav>

    <main role="main" style="min-height: 100vh; background: url('<?=base_url('assets/front/img/bg.jpg')?>') no-repeat center center; background-size: cover;" class="container-fluid mx-0">
      <?php (isset($pageContent)) ? $this->load->view($pageContent) : '' ?>
    </main><!-- /.container -->
    <script type="text/javascript" src="<?=base_url('assets/jquery/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/front/js/popper.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/front/js/bootstrap.min.js')?>"></script>
    <?php (isset($modal)) ? $this->load->view($modal) : '' ?>
  </body>
</html>
