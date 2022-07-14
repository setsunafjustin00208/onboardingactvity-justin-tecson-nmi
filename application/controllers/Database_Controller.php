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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Views_Controller/index');
    }
    
    /**For the Author page */

    public function add_author()
    {
        $add_author_look_up = $this->db->get_where('authors', array('fname' => $_POST['fname'],'lname' => $_POST['lname'],'mname' => $_POST['mname'] ));
        if($add_author_look_up->num_rows() > 0)
        {
            $_SESSION['message'] = "<div class='container box has-background-danger-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-danger'><span class='icon'><i class='fas fa-exclamation-triangle'></i></span><span>Author already added</span></span></div>";
            redirect('Views_Controller/authors_dashboard');
        }
        else if(!$add_author_look_up)
        {
            $_SESSION['message'] = "<div class='container box has-background-danger-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-danger'><span class='icon'><i class='fas fa-exclamation-triangle'></i></span><span>".$this->db->error()."</span></span></div>";
            redirect('Views_Controller/authors_dashboard');
        }
        else
        {
            $add_author=$this->db->insert('authors', $_POST);

            if(!$add_author)
            {
                $_SESSION['message'] = "<div class='container box has-background-danger-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-danger'><span class='icon'><i class='fas fa-exclamation-triangle'></i></span><span>".$this->db->error()."</span></span></div>";
                redirect('Views_Controller/authors_dashboard');
            }
            else
            {
                $_SESSION['message'] = "<div class='container box has-background-success-light animate__animated animate__fadeInUpBig'><span class='icon-text has-text-success'><span class='icon'><i class='fas fa-check-square'></i></span><span>Author successfully added</span></span></div>";
                redirect('Views_Controller/authors_dashboard');
            }
           
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

    /**End for the Book page */

}

/* End of file Database_Controller.php and path /application/controllers/Database_Controller.php */
