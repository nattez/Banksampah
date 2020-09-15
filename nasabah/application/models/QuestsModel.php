<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestsModel extends CI_Model
{
	
	public function getQuests($user_level)
	{
		//return $this->db->get('quest')->result_array();
		$query = "SELECT `quest`.*
		 	  	  FROM `quest`
		 	  	  WHERE `quest`.`min_level` = '$user_level'
		 		 ";
		return $this->db->query($query)->result_array();
	}

	public function getActiveQuests($username)
	{
		//return $this->db->get('active_quest')->result_array();
		$query = "
				  SELECT `active_quest`.`active_quest_id`,`active_quest`.`quest_id`,`active_quest`.`date_started`,`quest`.`quest_name`,`quest`.`info`,`quest`.`image`,`quest`.`points` 
		 	  	  FROM `quest`
		 	  	  JOIN `active_quest`
		 	  	  ON `quest`.`quest_id` = `active_quest`.`quest_id`
		 	  	  JOIN `user`
		 	  	  ON `user`.`user_id` = `active_quest`.`user_id`
		 	  	  WHERE `user`.`username` = '$username'
		 	  	  ORDER BY `active_quest`.`active_quest_id` DESC
		 		 ";
		 return $this->db->query($query)->result_array();
	}


}

?>