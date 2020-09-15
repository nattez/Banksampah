<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NasabahModel extends CI_Model
{
	

	public function getNasabah()
	{
		//return $this->db->get('user')->result_array();
		 $query = "SELECT `user`.`user_id`,`rekening_id`,`fullname`,`address`,`balance`,`phone_number`,`user_points`,`user_trash_size`
		 	  	  FROM `user`
		 	  	  WHERE role_id = 3
		 		 ";
		 return $this->db->query($query)->result_array();
	}

	public function editNasabah($user_id, $rekening_id, $fullname)
	{
		$query = $this->db->query(
				" UPDATE user 
				  SET rekening_id = '$rekening_id', fullname = '$fullname'
				  WHERE user_id = '$user_id' ");
		return $query;
	}

	public function deleteNasabah($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete('user');
	}

}

?>