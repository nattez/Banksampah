<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestModel extends CI_Model
{
	

	public function getQuest()
	{
		return $this->db->get('quest')->result_array();
		 // $query = "SELECT `user`.`user_id`,`rekening_id`,`fullname`,`address`,`balance`,`phone_number`
		 // 	  	  FROM `user`
		 // 	  	  WHERE role_id = 3
		 // 		 ";
		 // return $this->db->query($query)->result_array();
	}

	public function editQuest($quest_id, $quest_code, $quest_name)
	{
		$query = $this->db->query(
				" UPDATE quest 
				  SET quest_code = '$quest_code', quest_name = '$quest_name'
				  WHERE quest_id = '$quest_id' ");
		return $query;
	}

	public function deleteQuest($quest_id)
	{
		$this->db->where('quest_id', $quest_id);
		$this->db->delete('quest');
	}

}

?>