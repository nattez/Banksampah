<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SampahModel extends CI_Model
{
	

	public function getSampah()
	{
		return $this->db->get('trash')->result_array();
		 // $query = "SELECT `user`.`user_id`,`rekening_id`,`fullname`,`address`,`balance`,`phone_number`
		 // 	  	  FROM `user`
		 // 	  	  WHERE role_id = 3
		 // 		 ";
		 // return $this->db->query($query)->result_array();
	}

	public function editSampah($trash_id, $trash_code, $trash_name)
	{
		$query = $this->db->query(
				" UPDATE trash 
				  SET trash_code = '$trash_code', trash_name = '$trash_name'
				  WHERE trash_id = '$trash_id' ");
		return $query;
	}

	public function deleteSampah($trash_id)
	{
		$this->db->where('trash_id', $trash_id);
		$this->db->delete('trash');
	}

}

?>