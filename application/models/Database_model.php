<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Database_model extends CI_Model 
{                     
	public function get_login_data($username, $password)
	{
		$login_data = $this->db->query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
		$lrow = $login_data->row();
		$retrieved_data = array('user_id' => $lrow->user_id, 'username' => $lrow->username, 'password' => $lrow->password, 'logged_in' => TRUE);
		return $retrieved_data;
           
	}
}


/* End of file Database_model.php and path /application/models/Database_model.php */
