<!DOCTYPE html>
<html ng-app="Appku">
<head>
	<title><?= $title; ?></title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
</head>

<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
  <a class="navbar-brand" href="<?= site_url('crud'); ?>">PWA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" ui-sref="home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" ui-sref="about">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#!/pengurus">Pengurus</a>
          <a class="dropdown-item" href="#!/admin" >Admin</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- navbar -->

<div class="container" style="margin-top: 80px" ui-view> 
	
<div class="jumbotron">
  <h1 class="display-4"><?= $title?></h1>
  <p class="lead">Aplikasi PWA dengan Restful Library CodeIgniter dengan AngularJS + UI router.</p>
  <hr class="my-4">
  <p>by Rudy Eko Prasetya.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
	

</div>


<!-- include angularJS -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/angular.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/angular-ui-router.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
</body>
</html>