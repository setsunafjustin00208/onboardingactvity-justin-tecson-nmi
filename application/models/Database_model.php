<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Database_model extends CI_Model 
{                     
	public function get_login_data($username, $password)
	{
		$login_data_query = $this->db->query("SELECT user_id FROM users WHERE username = '{$username}' AND password = '{$password}'");
		if($login_data_query->num_rows() > 0)
		{
			$user_data = $login_data_query->row();
			$retrieved_data = $user_data->user_id;
			return $retrieved_data;

		}
		else
		{
			$retrieved_data = 0;
			return $retrieved_data;
		}
	}


/******* Author functions***********/
	public function add_author($first_name,$last_name,$middle_name)
	{
		$add_author_look_up = $this->db->get_where('authors', array('fname' => $first_name,'lname' => $last_name,'mname' => $middle_name ));
		if($add_author_look_up->num_rows() > 0)
		{
			$author_availability = TRUE;
			return $author_availability;
		}
		else
		{
			$this->db->insert('authors', $_POST);
			$author_availability = FALSE;
			return $author_availability ;
		}
	}
/******* End of Author functions ***********/

/******* Book finctions ***********/
	public function add_book($name)
	{
		$add_book_look_up = $this->db->get_where('books', array('name' => $name));
		if($add_book_look_up->num_rows() > 0)
		{
			$book_availability = TRUE;
			return $book_availability;
		}
		else
		{
			$this->db->insert('books', $_POST);
			$book_availability = FALSE;
			return $book_availability ;
		}
	}

/******* Book finctions ***********/

}


/* End of file Database_model.php and path /application/models/Database_model.php */
