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

	public function update_author($author_id)
	{
		$author_update_data = array(
            'fname'=>$_POST['fname'],
            'lname'=>$_POST['lname'],
            'mname'=>$_POST['mname'],
            'description'=>$_POST['description'],
            'date_updated'=>$_POST['date_updated']
        );

		$this->db->where('author_id',$author_id);
		$update_author_query = $this->db->update('authors',$author_update_data);

		if(!$update_author_query)
        {
			$query_success = FALSE;
			return $query_success;
            
        }
        else
        {
            $query_success = TRUE;
			return $query_success;
        }
	}

	public function delete_author($author_id)
	{
		$this->db->where('author_id',$author_id);
        $delete_author = $this->db->delete('authors');

		if(!$delete_author)
        {
			$query_success = FALSE;
			return $query_success;
            
        }
        else
        {
            $query_success = TRUE;
			return $query_success;
        }
	}
/******* End of Author functions ***********/

/******* Book functions ***********/
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
	public function update_book($book_id)
	{
		$updated_book_data = array(
            'name' => $_POST['name'],
            'author' => $_POST['author'],
            'description' => $_POST['description'],
            'description' => $_POST['description'],
            'date_updated' => $_POST['date_updated']
        );

		$this->db->where('book_id',$book_id);
		$update_book_query = $this->db->update('books',$updated_book_data);

		if(!$update_book_query)
        {
			$query_success = FALSE;
			return $query_success;
            
        }
        else
        {
            $query_success = TRUE;
			return $query_success;
        }
	}
	public function delete_book($book_id)
	{
		$this->db->where('book_id',$book_id);
        $delete_book = $this->db->delete('books');

		if(!$delete_book)
        {
			$query_success = FALSE;
			return $query_success;
            
        }
        else
        {
            $query_success = TRUE;
			return $query_success;
        }
	}

/******* End Book functions ***********/


}


/* End of file Database_model.php and path /application/models/Database_model.php */
