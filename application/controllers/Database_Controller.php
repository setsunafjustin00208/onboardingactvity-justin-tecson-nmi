<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Database_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {
        $username =  $_POST['username'];
        $password = $_POST['password'];
        
        $loginquery = $this->db->query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");

        if($loginquery->num_rows() > 0)
        {
            $lrow = $loginquery->row();
            $userdata = array('user_id' => $lrow->user_id, 'username' => $lrow->username, 'password' => $lrow->password, 'logged_in' => TRUE);
            $this->session->set_userdata($userdata);
            redirect("Views_Controller/books_dashboard");
            
        }
        else
        {
            $_SESSION['validation'] = "Invalid Username and/or Password";
            redirect("Views_Controller/index");
        }
    }

}

/* End of file Database_Controller.php and path /application/controllers/Database_Controller.php */
