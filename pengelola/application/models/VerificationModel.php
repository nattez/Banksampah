<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificationModel extends CI_Model
{
	

	public function getVerification()
	{
		//return $this->db->get('quest')->result_array();
		$query = "SELECT `user`.*,`active_quest`.*,`quest`.*
		  	  	  FROM `user`
		  	  	  JOIN `active_quest` 
		  	  	  ON `active_quest`.`user_id` = `user`.`user_id`
		  	  	  JOIN `quest`
		  	  	  ON `quest`.`quest_id` = `active_quest`.`quest_id`
		  	  	  ORDER BY `active_quest`.`active_quest_id` DESC
		  		 ";
		return $this->db->query($query)->result_array();
	}

	public function processQuest($active_quest_id, $user_id, $user_points, $input_size_trash, $quest_points, $date_ended)
	{
		//QUERY UPDATE USER PROGRESS
		$this->db->query(
				" UPDATE user, active_quest, quest, trash 
				  SET `user`.`user_progress` = '$user_points'+`quest`.`points`
				  WHERE `user`.`user_id` = `active_quest`.`user_id`
				  AND `quest`.`quest_id` = `active_quest`.`quest_id`
				  AND '$active_quest_id' = `active_quest`.`active_quest_id`
				  AND `quest`.`trash_name` = `trash`.`trash_name`
				  AND '$input_size_trash' >= `quest`.`quest_trash_size`-0.00001
				 ");
		//QUERY UPDATE STATUS QUEST SELESAI
		$this->db->query(
				" UPDATE user, active_quest, quest, trash 
				  SET `active_quest`.`stat` = 'Selesai'
				  WHERE `user`.`user_id` = `active_quest`.`user_id`
				  AND `quest`.`quest_id` = `active_quest`.`quest_id`
				  AND '$active_quest_id' = `active_quest`.`active_quest_id`
				  AND `quest`.`trash_name` = `trash`.`trash_name`
				  AND '$input_size_trash' >= `quest`.`quest_trash_size`-0.00001
				 ");
		//QUERY UPDATE STATUS QUEST SELESAI
		$this->db->query(
				" UPDATE user, active_quest, quest, trash 
				  SET `active_quest`.`stat` = 'Gagal'
				  WHERE `user`.`user_id` = `active_quest`.`user_id`
				  AND `quest`.`quest_id` = `active_quest`.`quest_id`
				  AND '$active_quest_id' = `active_quest`.`active_quest_id`
				  AND `quest`.`trash_name` = `trash`.`trash_name`
				  AND '$input_size_trash' <= `quest`.`quest_trash_size`-0.00001
				 ");
		//QUERY UPDATE USER POINT
		$this->db->query(
				" UPDATE user, active_quest, quest, trash 
				  SET `user`.`user_points` = '$user_points'+`quest`.`points`
				  WHERE `user`.`user_id` = `active_quest`.`user_id`
				  AND `quest`.`quest_id` = `active_quest`.`quest_id`
				  AND '$active_quest_id' = `active_quest`.`active_quest_id`
				  AND `quest`.`trash_name` = `trash`.`trash_name`
				  AND '$input_size_trash' >= `quest`.`quest_trash_size`-0.00001
				 ");
		//QUERY UPDATE USER BALANCE
		$this->db->query(
				" UPDATE user, active_quest, quest, trash 
				  SET `user`.`balance` = `user`.`balance`+'$input_size_trash'*`trash`.`price`
				  WHERE `user`.`user_id` = `active_quest`.`user_id`
				  AND `quest`.`quest_id` = `active_quest`.`quest_id`
				  AND '$active_quest_id' = `active_quest`.`active_quest_id`
				  AND `quest`.`trash_name` = `trash`.`trash_name`
				 ");
		//QUERY UPDATE USER TOTAL SIZE SAMPAH 
		$this->db->query(
				" UPDATE user, active_quest, quest, trash 
				  SET `user`.`user_trash_size` = `user`.`user_trash_size`+'$input_size_trash'
				  WHERE `user`.`user_id` = `active_quest`.`user_id`
				  AND `quest`.`quest_id` = `active_quest`.`quest_id`
				  AND '$active_quest_id' = `active_quest`.`active_quest_id`
				  AND `quest`.`trash_name` = `trash`.`trash_name`
				 ");
		//QUERY UPDATE TOTAL SIZE SAMPAH 
		$this->db->query(
				" UPDATE user, active_quest, quest, trash 
				  SET `trash`.`size` = `trash`.`size`+'$input_size_trash'
				  WHERE `user`.`user_id` = `active_quest`.`user_id`
				  AND `quest`.`quest_id` = `active_quest`.`quest_id`
				  AND '$active_quest_id' = `active_quest`.`active_quest_id`
				  AND `quest`.`trash_name` = `trash`.`trash_name`
				 ");
		//QUERY UPDATE DATE ENDED 
		$this->db->query(
				" UPDATE user, active_quest, quest 
				  SET `active_quest`.`date_ended` = '$date_ended'
				  WHERE `user`.`user_id` = `active_quest`.`user_id`
				  AND `quest`.`quest_id` = `active_quest`.`quest_id`
				  AND '$active_quest_id' = `active_quest`.`active_quest_id`
				 ");

		//UPDATE LEVEL USER
		$active_quest_id = $this->input->post('activequestId');
		$user_points = $this->input->post('userPoints');
		$quest_points = $this->input->post('questPoints');
		$dummy = $user_points+$quest_points;
		if (($dummy >= 99 AND $dummy < 200) OR ($user_points < 101 AND $user_points > 199)) {
			//QUERY UPDATE USER LEVEL1
			$this->db->query(
				" UPDATE user 
				  SET `user`.`user_level` = `user`.`user_level`+1
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 1
				 ");
			$this->db->query(
				" UPDATE user 
				  SET `user`.`user_progress` = `user`.`user_points`-100
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 2
				 ");
			$this->db->query(
				" UPDATE user 
				  SET `user`.`user_dummy_points` = 200
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 2
				 ");
		} elseif (($dummy >= 199 AND $dummy < 300) OR ($user_points < 201 AND $user_points > 299)) {
				//QUERY UPDATE USER LEVEL2
				$this->db->query(
				" UPDATE user 
				  SET `user`.`user_level` = `user`.`user_level`+1
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 2
				 ");
				$this->db->query(
				" UPDATE user 
				  SET `user`.`user_progress` = `user`.`user_points`-200
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 3
				 ");
				$this->db->query(
				" UPDATE user 
				  SET `user`.`user_dummy_points` = 300
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 3
				 ");
			} elseif (($dummy >= 299 AND $dummy < 400) OR ($user_points < 301 AND $user_points > 399)) {
				//QUERY UPDATE USER LEVEL3
				$this->db->query(
				" UPDATE user 
				  SET `user`.`user_level` = `user`.`user_level`+1
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 3
				 ");
				$this->db->query(
				" UPDATE user 
				  SET `user`.`user_progress` = `user`.`user_points`-300
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 4
				 ");
				$this->db->query(
				" UPDATE user 
				  SET `user`.`user_dummy_points` = 400
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 4
				 ");
			} elseif (($dummy >= 399 AND $dummy < 500) OR ($user_points < 401 AND $user_points > 499)) {
				//QUERY UPDATE USER LEVEL4
				$this->db->query(
				" UPDATE user 
				  SET `user`.`user_level` = `user`.`user_level`+1
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 4
				 ");
				$this->db->query(
				" UPDATE user 
				  SET `user`.`user_progress` = `user`.`user_points`-500
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 5
				 ");
				$this->db->query(
				" UPDATE user 
				  SET `user`.`user_dummy_points` = 500
				  WHERE '$user_id' = `user`.`user_id`
				  AND `user`.`user_level` = 5
				 ");
			} //endif


		//QUERY DELETE ACTIVE QUEST
		$this->db->where('active_quest_id', $active_quest_id);
		$this->db->delete('active_quest');
		
		
	}

	public function deleteActiveQuest($active_quest_id)
	{
		$this->db->where('active_quest_id', $active_quest_id);
		$this->db->delete('active_quest');
	}

}

?>