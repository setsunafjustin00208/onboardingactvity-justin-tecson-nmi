<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Views_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
             $this->load->view('index');
			    
    }
    public function books_dashboard()
    {
            $this->load->view('books_dashboard');
			    
    }
}

/* End of file Views_Controller.php and path /application/controllers/Views_Controller.php */
