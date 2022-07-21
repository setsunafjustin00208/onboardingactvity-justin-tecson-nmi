/*
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
        */
