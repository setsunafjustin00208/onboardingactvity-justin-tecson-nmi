<?php
$loginVerification = $this->session->userdata('logged_in');


if($loginVerification)
{
    redirect('Views_Controller/books_dashboard');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Book Inventory</title>
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
<nav class="navbar is-link is-fixed-top" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="<?=site_url('Views_Controller/index')?>">
		<i class="icon is-large fas fa-book fa-lg"></i>
      <h2 class="title ml-3 has-text-light">Book Information</h2>
    </a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
</nav>
<section class="hero is-light is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-5-tablet is-4-desktop is-3-widescreen">
          <div class="box animate__animated animate__fadeInUpBig">
            <center>
              <span class="icon is-large">
                <i class="fas fa-book-open fa-10x"></i>
              </span>
              <h3 class="title is-3">Log-In</h3>
            </center>
            <?=validation_errors()?>
            <?=form_open("Database_Controller/login")?>
              <div class="field">
                <label for="" class="label">Username</label>
                <div class="control has-icons-left">
                  <input type="text" placeholder="Enter username" class="input" name="username" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                  </span>
                </div>
              </div>
              <div class="field">
                <label for="" class="label">Password</label>
                <div class="control has-icons-left">
                  <input type="password" placeholder="Enter Password" class="input" name="password" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
								<div class="field icon-text mt-4 mb-4 has-text-danger">
										<?php
														if(isset($validation))
														{
											?>
													<span class="icon">
														<i class="fas fa-exclamation-triangle"></i>
													</span>
													<span>
															<?php echo $validation ?>
													</span>
										<?php
														}
										?>
								</div>
              </div>
              <div class="field">
                <button class="button is-success">
                  Login
                </button>
              </div>
              <?=form_close()?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
