<?php
$loginVerification = $this->session->userdata('logged_in');
$username = $this->session->userdata('username');

if(!$loginVerification)
{
    redirect('Views_Controller/index');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/all.min.css" type="text/css"> 
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bulma-rtl.min.css" type="text/css"> 
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bulma.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dataTables.bulma.min.css" type="text/css"> 
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dataTables.dataTables.min.css" type="text/css"> 
    <link rel="stylesheet" href="<?=base_url()?>assets/css/datatables.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.dataTables.min.css" type="text/css"> 
    <link rel="stylesheet" href="<?=base_url()?>assets/css/modal-fx.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.min.css" type="text/css">
    <script src="<?=base_url()?>assets/js/all.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/dataTables.bulma.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/datatables.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/dataTables.dataTables.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/modal-fx.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/mine.js" type="text/javascript"></script>
    <title>Welcome <?=$username?></title>
</head>
<body>
<script>
	$(document).ready(function() {
	$(".navbar-burger").click(function() {

		$(".navbar-burger").toggleClass("is-active");
		$(".navbar-menu").toggleClass("is-active");

	});
	});
</script>
<nav class="navbar is-link mb-4" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <i class="icon is-large fas fa-book fa-lg"></i>
        <h2 class="title ml-3 has-text-light">Book inventory</h2>
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
     
    </div>
    <div class="navbar-end mr-5">
      <div class="navbar-item">
        <div class="buttons">
          <a href="<?=site_url('Database_Controller/logout')?>" class="button is-danger ml-6">
          <i class="fas fa-arrow-right-to-bracket"></i>
            &nbsp;
            Log out
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<div class="columns is-mobile">
  <div class="column is-2 ml-4 has-background-light">
  <aside class="menu">
      <p class="menu-label">
        Menu
      </p>
      <ul class="menu-list">
        <li>
          <a class="is-active"><span class="icon-text">
            <span class="icon is-medium">
              <i class="fas fa-book-journal-whills fa-2x"></i>
            </span>
            <span class="">
              Books
            </span>
          </a>
        </li>
        <li>
          <a class=""><span class="icon-text">
            <span class="icon is-medium">
              <i class="fas fa-book-open-reader fa-2x"></i>
            </span>
            <span>
              Authors
            </span>
          </a>
        </li>
      </ul>
    </aside>
  </div>
  <div class="column box">
      <div class="table-container">
          
      </div>  
  </div>
</div>
</body>
</html>