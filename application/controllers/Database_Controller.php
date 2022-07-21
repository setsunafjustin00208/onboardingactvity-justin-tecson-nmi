<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        
class Database_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('database_model');
    }
    public function login()
    {

        $username =  $_POST['username'];
        $password = $_POST['password'];
		$data['retrieved_data'] = $this->database_model->get_login_data($username,$password);
        $user_id =  $data['retrieved_data'];
		if($user_id > 0)
		{	
			$userdata = array('user_id'=>$user_id, 'logged_in' => TRUE);
			$this->session->set_userdata($userdata);
			redirect("Views_Controller/books_dashboard");
		}
		else
		{
			$message['validation'] = "Invalid Username and/or Password";
			$this->load->view('index', $message, FALSE);
			
		}	
		
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Views_Controller/index');
    }
    
    /**For the Author page */

    public function add_author()
    {
		$author_data['author_availability'] = $this->database_model->add_author($_POST['fname'],$_POST['lname'], $_POST['mname']);
		$author_availability = $author_data['author_availability'];

		if($author_availability == TRUE)
		{
			$message['error'] = "Author already added";
			$this->load->view('authors_dashboard', $message, FALSE);
			
		}

		else if($author_availability == FALSE)
		{
			$message['success'] = "Author created successfully";
			$this->load->view('authors_dashboard', $message, FALSE);
		}
		
    }
    public function update_author()
    {
        $author_update_data = array(
            'fname'=>$_POST['fname'],
            'lname'=>$_POST['lname'],
            'mname'=>$_POST['mname'],
            'description'=>$_POST['description'],
            'date_updated'=>$_POST['date_updated']
        );

        $this->db->where('author_id',$_POST['author_id']);                        
        $update_author_query = $this->db->update('authors',$author_update_data);

        if(!$update_author_query)
        {
            $_SESSION['message'] = "<div class='container box has-background-danger-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-danger'><span class='icon'><i class='fas fa-exclamation-triangle'></i></span><span>".$this->db->error()."</span></span></div>";
            redirect('Views_Controller/authors_dashboard');
        }
        else
        {
            $_SESSION['message'] = "<div class='container box has-background-success-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-success'><span class='icon'><i class='fas fa-check-square'></i></span><span>Author successfully updated  </span></span></div>";
            redirect('Views_Controller/authors_dashboard');
        }
    }
    public function delete_author()
    {
        $this->db->where('author_id',$_POST['author_id']);
        $delete_author = $this->db->delete('authors');

        if(!$delete_author)
        {
            $_SESSION['message'] = "<div class='container box has-background-danger-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-danger'><span class='icon'><i class='fas fa-exclamation-triangle'></i></span><span>".$this->db->error()."</span></span></div>";
            redirect('Views_Controller/authors_dashboard');
        }
        else
        {
            $_SESSION['message'] = "<div class='container box has-background-success-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-success'><span class='icon'><i class='fas fa-check-square'></i></span><span>Author successfully deleted  </span></span></div>";
            redirect('Views_Controller/authors_dashboard');
        }
    }

    /**End for the Author page */

    /**For the Book page */

    public function add_book()
    {

		$book_data['book_availability'] = $this->database_model->add_book($_POST['name']);
		$book_availability = $book_data['book_availability'];

		if($book_availability == TRUE)
		{
			$message['error'] = "Book already added";
			$this->load->view('books_dashboard', $message, FALSE);
			
		}

		else if($book_availability == FALSE)
		{
			$message['success'] = "Book created successfully";
			$this->load->view('books_dashboard', $message, FALSE);
		}
    }

    public function update_book()
    {
        $updated_book_data = array(
            'name' => $_POST['name'],
            'author' => $_POST['author'],
            'description' => $_POST['description'],
            'description' => $_POST['description'],
            'date_updated' => $_POST['date_updated']
        );

        $this->db->where('book_id',$_POST['book_id']);
        $update_book_query = $this->db->update('books', $updated_book_data);

        if(!$update_book_query)
        {
            $_SESSION['message'] = "<div class='container box has-background-danger-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-danger'><span class='icon'><i class='fas fa-exclamation-triangle'></i></span><span>".$this->db->error()."</span></span></div>";
            redirect('Views_Controller/books_dashboard');
        }
        else
        {
            $_SESSION['message'] = "<div class='container box has-background-success-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-success'><span class='icon'><i class='fas fa-check-square'></i></span><span>Book successfully updated  </span></span></div>";
            redirect('Views_Controller/books_dashboard');
        }

    }

    public function delete_book()
    {
        $this->db->where('book_id',$_POST['book_id']);
        $delete_book = $this->db->delete('books');

        if(!$delete_book)
        {
            $_SESSION['message'] = "<div class='container box has-background-danger-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-danger'><span class='icon'><i class='fas fa-exclamation-triangle'></i></span><span>".$this->db->error()."</span></span></div>";
            redirect('Views_Controller/books_dashboard');
        }
        else
        {
            $_SESSION['message'] = "<div class='container box has-background-success-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-success'><span class='icon'><i class='fas fa-check-square'></i></span><span>Book successfully deleted  </span></span></div>";
            redirect('Views_Controller/books_dashboard');
        }
    }

    /**End for the Book page */

}

/* End of file Database_Controller.php and path /application/controllers/Database_Controller.php */
