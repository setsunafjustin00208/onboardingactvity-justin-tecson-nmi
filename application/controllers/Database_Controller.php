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
       $query_status['query_success'] = $this->database_model->update_author($_POST['author_id']);
	   $status_query = $query_status['query_success'];

		if($status_query == FALSE)
		{
			$message['error'] = "Author didn't succussfully updated";
			$this->load->view('authors_dashboard', $message, FALSE);
			
		}

		else if($status_query == TRUE)
		{
			$message['success'] = "Author successfully updated";
			$this->load->view('authors_dashboard', $message, FALSE);
		}

      
    }
    public function delete_author()
    {
		$query_status['query_success'] = $this->database_model->delete_author($_POST['author_id']);
		$status_query = $query_status['query_success'];
 
		 if($status_query == FALSE)
		 {
			 $message['error'] = "Author didn't succussfully deleted";
			 $this->load->view('authors_dashboard', $message, FALSE);
			 
		 }
 
		 else if($status_query == TRUE)
		 {
			 $message['success'] = "Author successfully deleted";
			 $this->load->view('authors_dashboard', $message, FALSE);
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
        $query_status['query_success'] = $this->database_model->update_book($_POST['author_id']);
	    $status_query = $query_status['query_success'];

		if($status_query == FALSE)
		{
			$message['error'] = "Book didn't succussfully updated";
			$this->load->view('books_dashboard', $message, FALSE);
			
		}

		else if($status_query == TRUE)
		{
			$message['success'] = "Book successfully updated";
			$this->load->view('books_dashboard', $message, FALSE);
		}

    }

    public function delete_book()
    {
		$query_status['query_success'] = $this->database_model->delete_book($_POST['book_id']);
		$status_query = $query_status['query_success'];
 
		 if($status_query == FALSE)
		 {
			 $message['error'] = "Book didn't succussfully deleted";
			 $this->load->view('books_dashboard', $message, FALSE);
			 
		 }
 
		 else if($status_query == TRUE)
		 {
			 $message['success'] = "Book successfully deleted";
			 $this->load->view('books_dashboard', $message, FALSE);
		 }
    }

    /**End for the Book page */

}

/* End of file Database_Controller.php and path /application/controllers/Database_Controller.php */
