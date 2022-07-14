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
		<script src="<?=base_url()?>assets/js/modal-fx.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
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
        <h2 class="title ml-3 has-text-light">Book Information</h2>
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
<section class="hero is-info mb-6">
  <div class="hero-body has-text-centered">
    <p class="title">
			<span class="icon-text">
				<span class="icon"><i class="fas fas fa-user-pen"></i></span>
                &nbsp;
				<span>Manage Authors</span>
			</span>
    </p>
    <p class="subtitle">
      Add a new, edit or delete an existing Author's information
    </p>
  </div>
</section>
<div class="columns is-mobile">
  <div class="column is-2 ml-4 has-background-light">
  <aside class="menu">
      <p class="menu-label">
        Menu
      </p>
      <ul class="menu-list">
        <li>
          <a href="<?=site_url('Views_Controller/books_dashboard')?>"><span class="icon-text">
            <span class="icon is-medium">
              <i class="fas fa-book-journal-whills fa-2x"></i>
            </span>
            <span class="">
              Books
            </span>
          </a>
        </li>
        <li>
          <a href="<?=site_url('Views_Controller/authors_dashboard')?>" class="is-active"><span class="icon-text">
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
		<script>
				document.addEventListener('DOMContentLoaded', () => {
	
				function openModal($el) {
					$el.classList.add('is-active');
				}

				function closeModal($el) {
					$el.classList.remove('is-active');
				}

				function closeAllModals() {
					(document.querySelectorAll('.modal') || []).forEach(($modal) => {
						closeModal($modal);
					});
				}

				// Add a click event on buttons to open a specific modal
				(document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
					const modal = $trigger.dataset.target;
					const $target = document.getElementById(modal);

					$trigger.addEventListener('click', () => {
						openModal($target);
					});
				});

				(document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
					const $target = $close.closest('.modal');

					$close.addEventListener('click', () => {
						closeModal($target);
					});
				});

			
				document.addEventListener('keydown', (event) => {
					const e = event || window.event;

					if (e.keyCode === 27) {
						closeAllModals();
					}
				});
			});
		</script>
		<div class="buttons">
            <button class="button is-success js-modal-trigger" data-target="modal-add-author">
              <span class="icon-text">
                  <span class="icon">
                      <i class="fas fa-plus"></i>
                  </span>
                  <span>
                      Add Author
                  </span>
              </span>
            </button>
              <div class="modal" id="modal-add-author">
                  <div class="modal-background"></div>
                  <div class="modal-card">
                      <header class="modal-card-head">
                          <p class="modal-card-title">Add a new Author</p>
                          <button class="delete" aria-label="close"></button>
                      </header>
                          <section class="modal-card-body">
                            <?=form_open('Database_Controller/add_author')?>
                            <?=validation_errors()?>
                              <div class="container">
                                <div class="field">
                                  <label class="label">First name</label>
                                  <div class="control">
                                    <input class="input" type="text" placeholder="Enter First name" name="fname" min=5 max=150>
                                  </div>
                                </div>
                                <div class="field">
                                  <label class="label">Last name</label>
                                  <div class="control">
                                    <input class="input" type="text" placeholder="Enter Last name" name="lname" min=5 max=150>
                                  </div>
                                </div>
                                <div class="field">
                                  <label class="label">Middle name</label>
                                  <div class="control">
                                    <input class="input" type="text" placeholder="Enter Middle name" name="mname" min=5 max=150>
                                  </div>
                                </div>
                                <div class="field">
                                  <label class="label">Author Information</label>
                                  <div class="control">
                                    <textarea style="resize: none;" class="textarea" placeholder="Enter Author Information" rows=10 name="description" min=5 max=150></textarea>
                                  </div>
                                </div>
                                <input type="hidden" name="date_created" value="<?=date("Y-m-d")?>">
                                <input type="hidden" name="date_updated" value="<?=date("Y-m-d")?>"">
                              </div>
                          </section>
                      <footer class="modal-card-foot">
                            <button class="button is-success">
                              <span class="icon-text">
                                <span class="icon">
                                  <i class="fas fa-floppy-disk"></i>
                                </span>
                                <span>
                                  Save Author
                                </span>
                              </span>
                            </button>
                          <?=form_close()?>
                          <button class="button">
                            <span class="icon-text"><span class="icon">
                              <i class="fas fa-ban"></i>
                            </span>
                            <span>Cancel</span>
                        </button>
                      </footer>
                  </div>
              </div>
		</div>
    <?php
        if(isset($_SESSION['message']))
        {

          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
      
      ?>
    <script>
      $(document).ready(function () {
          $('#author').DataTable();
      });
    </script>
      <div class="table-container">
          <table class="table" id="author">
			    <thead>
				    <tr>
              <th>Author ID</th>
              <th>First name</th>
              <th>Last Name</th>
              <th>Middle name</th>
              <th>Descriptiom</th>
              <th>Date Created</th>
              <th>Date Updated</th>
              <th>Action</th>
					</tr>
								
				</thead>
				<tbody>
				    <?php
					    $authorquery = $this->db->get('authors');
						foreach($authorquery->result() as $authorrow)
						{
					?>
				    <tr>		
                <td><?=$authorrow->author_id?></td>
                <td><?=$authorrow->fname?></td>
                <td><?=$authorrow->lname?></td>
                <td><?=$authorrow->mname?></td>
                <td><?=$authorrow->description?></td>
                <td><?=$authorrow->date_created?></td>
                <td><?=$authorrow->date_updated?></td>
                <td>
                  <div class="buttons">
                    <button class="button is-warning js-modal-trigger" data-target="modal-edit-author<?=$authorrow->author_id?>">
                      <span class="icon-text">
                          <span class="icon">
                              <i class="fas fa-pen-to-square"></i>
                          </span>
                          <span>
                              Edit Author
                          </span>
                      </span>
                    </button>
                    <div class="modal" id="modal-edit-author<?=$authorrow->author_id?>">
                      <div class="modal-background"></div>
                      <div class="modal-card">
                          <header class="modal-card-head">
                              <p class="modal-card-title">Edit Author</p>
                              <button class="delete" aria-label="close"></button>
                          </header>
                              <section class="modal-card-body">
                                <?=form_open('Database_Controller/update_author')?>
                                <?=validation_errors()?>
                                  <div class="container">
                                    <input type="hidden" name="author_id" value="<?=$authorrow->author_id?>">
                                    <div class="field">
                                      <label class="label">First name</label>
                                      <div class="control">
                                        <input class="input" type="text" value="<?=$authorrow->fname?>" name="fname" min=5 max=150>
                                      </div>
                                    </div>
                                    <div class="field">
                                      <label class="label">Last name</label>
                                      <div class="control">
                                        <input class="input" type="text" value="<?=$authorrow->lname?>"  name="lname" min=5 max=150>
                                      </div>
                                    </div>
                                    <div class="field">
                                      <label class="label">Middle name</label>
                                      <div class="control">
                                        <input class="input" type="text" value="<?=$authorrow->mname?>"  name="mname" min=5 max=150>
                                      </div>
                                    </div>
                                    <div class="field">
                                      <label class="label">Author Information</label>
                                      <div class="control">
                                        <textarea style="resize: none;" class="textarea" rows=10 name="description" min=5 max=150><?=$authorrow->description?></textarea>
                                      </div>
                                    </div>
                                    <input type="hidden" name="date_updated" value="<?=date("Y-m-d")?>"">
                                  </div>
                              </section>
                          <footer class="modal-card-foot">
                                <button class="button is-success">
                                  <span class="icon-text">
                                    <span class="icon">
                                      <i class="fas fa-floppy-disk"></i>
                                    </span>
                                    <span>
                                      Update Author
                                    </span>
                                  </span>
                                </button>
                              <?=form_close()?>
                              <button class="button">
                                <span class="icon-text"><span class="icon">
                                  <i class="fas fa-ban"></i>
                                </span>
                                <span>Cancel</span>
                            </button>
                          </footer>
                      </div>
                  </div>
                  <button class="button is-danger js-modal-trigger" data-target="modal-delete-author<?=$authorrow->author_id?>">
                      <span class="icon-text">
                          <span class="icon">
                              <i class="fas fa-trash-can"></i>
                          </span>
                          <span>
                              Delete Author
                          </span>
                      </span>
                    </button>
                    <div class="modal" id="modal-delete-author<?=$authorrow->author_id?>">
                      <div class="modal-background"></div>
                      <div class="modal-card">
                          <header class="modal-card-head">
                              <p class="modal-card-title">Delete Author?</p>
                              <button class="delete" aria-label="close"></button>
                          </header>
                              <section class="modal-card-body">
                                <?=form_open('Database_Controller/delete_author')?>
                                <?=validation_errors()?>
                                <input type="hidden" name="author_id" value="<?=$authorrow->author_id?>">
                                  <p class="subtitle is-5"> 
                                      Are you sure to delete this Author?
                                  </p>
                              </section>
                          <footer class="modal-card-foot">
                                <button class="button is-danger">
                                  <span class="icon-text">
                                    <span class="icon">
                                      <i class="fas fa-check"></i>
                                    </span>
                                    <span>
                                      Yes
                                    </span>
                                  </span>
                                </button>
                              <?=form_close()?>
                              <button class="button is-success">
                                <span class="icon-text"><span class="icon">
                                  <i class="fas fa-xmark"></i>
                                </span>
                                <span>No</span>
                            </button>
                          </footer>
                      </div>
                  </div>
                  </div>
                </td>
					</tr>
					<?php
					    }
					?>
				</tbody>
				    <tfoot>
                        <tr>
                            <th>Author ID</th>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>Middle name</th>
                            <th>Descriptiom</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Action</th>
                        </tr>
					</tfoot>
			</table>
      </div>  
  </div>
</div>
</body>
</html>
